

//---------------CONSENT---------------

$table='consent';

if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
{
$id_form=$result['data']['last_id'];
}
else
print 'LAST_ID_EMPTY';

$fields=array();
$fields[]='consent_name';
$fields[]='sign';
$fields[]='id_form';

$datas=array();
$datas['consent_name']=$consent_name1;
$datas['sign']=$sign1;
$datas['id_form']=$id_form;

$this->load->model('M_Main');
$result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

$fields=array();
$fields[]='consent_name';
$fields[]='sign';
$fields[]='id_form';

$datas=array();
$datas['consent_name']=$consent_name2;
$datas['sign']=$sign2;
$datas['id_form']=$id_form;

$this->load->model('M_Main');
$result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

$fields=array();
$fields[]='consent_name';
$fields[]='sign';
$fields[]='id_form';

$datas=array();
$datas['consent_name']=$consent_name3;
$datas['sign']=$sign3;
$datas['id_form']=$id_form;

$this->load->model('M_Main');
$result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

//---------------CONSENT---------------

print $id_employee;<?php
/**
 * Created by PhpStorm.
 * User: raydel
 * Date: 2/17/18
 * Time: 7:35 PM
 */