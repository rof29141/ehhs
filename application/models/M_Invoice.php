<?php
Class M_Invoice extends CI_Model
{
    private $fm;

    function  __construct()
    {
        parent::__construct();
        $this->load->model('MacTutorREST');
        $this->fm = new MacTutorREST ();
    }

    function error($result)
    {
        if (array_key_exists("errorCode", $result) && array_key_exists("errorMessage", $result))
        {
            return 'Something is wrong: (' . $result ["errorCode"] . ') ' . $result ["errorMessage"] . "\n";
        }
        elseif (array_key_exists("errorMessage", $result))
        {
            return 'Something is wrong: ' . $result ["errorMessage"] . "\n";
        }
        else
            return 0;
    }

    function GetMyInvoices($id_patient)
    {
        $layout='PHP_Invoice';

        $request1['ClientRec'] = $id_patient;

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        $sort1['fieldName'] = 'Date';
        $sort1['sortOrder'] = 'descend';
        $sort = array ($sort1);
        $criteria['sort'] = $sort;
        print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $field['__zkp_Billing_Rec'] = $result["data"][$i]["fieldData"]["__zkp_Billing_Rec"];
                $field['Anchor'] = $result["data"][$i]["fieldData"]["Anchor"];
                $field['MNI_Category_F'] = $result["data"][$i]["fieldData"]["MNI_Category_F"];
                $field['BIL_ID_D'] = $result["data"][$i]["fieldData"]["BIL_ID_D"];
                $field['CLI_ID_L'] = $result["data"][$i]["fieldData"]["CLI_ID_L"];
                $field['CLI_ChartID_D_L'] = $result["data"][$i]["fieldData"]["CLI_ChartID_D_L"];
                $field['Discount_Percent'] = $result["data"][$i]["fieldData"]["Discount_Percent"];
                $field['Date'] = $result["data"][$i]["fieldData"]["Date"];
                $field['Facility'] = $result["data"][$i]["fieldData"]["Facility"];
                $field['Total_PreDiscount'] = $result["data"][$i]["fieldData"]["Total_PreDiscount"];
                $field['Discount'] = $result["data"][$i]["fieldData"]["Discount"];
                $field['Tax'] = $result["data"][$i]["fieldData"]["Tax"];
                $field['Total_PostTax'] = $result["data"][$i]["fieldData"]["Total_PostTax"];
                $field['HaveLines'] = $result["data"][$i]["fieldData"]["HaveLines"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }

    function GetInvoiceLine($id_invoice, $anchor, $cat)
    {
        $layout='PHP_Invoice_Line';

        $request1['BillingRec'] = $id_invoice;
        $request1['IsBIL_item?'] = $anchor;
        $request1['Category_f'] = $cat;

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        //print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['BillingRec'] = $result["data"][$i]["fieldData"]["BillingRec"];
                $field['MNI_Category'] = $result["data"][$i]["fieldData"]["MNI_Category"];
                $field['MNI_Name'] = $result["data"][$i]["fieldData"]["MNI_Name"];
                $field['CPT_Code'] = $result["data"][$i]["fieldData"]["CPT_Code"];
                $field['Qty'] = $result["data"][$i]["fieldData"]["Qty"];
                $field['Rate'] = $result["data"][$i]["fieldData"]["Rate"];
                $field['BIL_Total'] = $result["data"][$i]["fieldData"]["BIL_Total"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }
}
?>