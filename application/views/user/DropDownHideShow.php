<div class="multiselect">
    <div class="selectBox" onclick='document.getElementById("checkboxes").style.display = "block";' >

        <select>
            <option>Hide or Show columns</option>
        </select>
        <div class="overSelect"></div>
    </div>
    <div id="checkboxes" style="padding: 4px;" onmouseleave='document.getElementById("checkboxes").style.display = "none";'>

        <input type="checkbox" checked class="toggle-vis" value="1" name="1" id="1"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(1)" for="1"><label>Full name</label></a><br>
        <input type="checkbox" checked class="toggle-vis" value="2" name="2" id="2"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(2)" for="2"><label>Title</label></a><br>
        <input type="checkbox" checked class="toggle-vis" value="3" name="3" id="3"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(3)" for="3"><label>Email</label></a><br>
        <input type="checkbox" checked class="toggle-vis" value="4" name="4" id="4"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(4)" for="4"><label>User ID</label></a><br>
        <input type="checkbox" checked class="toggle-vis" value="5" name="5" id="5"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(5)" for="5"><label>Account Type</label></a><br>
        <input type="checkbox" checked class="toggle-vis" value="6" name="6" id="6"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(6)" for="6"><label>Permisions</label></a><br>
        <!-- <input type="checkbox" checked class="toggle-vis" value="7" name="7" id="7"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(7)" for="7"><label>Vanity URL</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="8" name="8" id="8"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(8)" for="8"><label>Source Code</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="9" name="9" id="9"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(9)" for="9"><label>Total Cost</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="10" name="10" id="10"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(10)" for="10"><label>Risk Level</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="11" name="11" id="11"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(11)" for="11"><label>Type</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="12" name="12" id="12"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(12)" for="12"><label>Band</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="13" name="13" id="13"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(13)" for="13"><label>Creative ID</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="14" name="14" id="14"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(14)" for="14"><label>Live checked Read</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="15" name="15" id="15"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(15)" for="15"><label>Voiced</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="16" name="16" id="16"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(16)" for="16"><label>Generic</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="17" name="17" id="17"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(17)" for="17"><label>Ownership</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="18" name="18" id="18"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(18)" for="18"><label>Market Name</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="19" name="19" id="19"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(19)" for="19"><label>Market ID</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="20" name="20" id="20"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(20)" for="20"><label>Format</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="21" name="21" id="21"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(21)" for="21"><label>Spot Date</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="22" name="22" id="22"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(22)" for="22"><label>Spot Time</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="23" name="23" id="23"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(23)" for="23"><label>Spot Length</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="24" name="24" id="24"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(24)" for="24"><label>Music Bed</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="25" name="25" id="25"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(25)" for="25"><label>Talent</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="26" name="26" id="26"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(26)" for="26"><label>Actionable?</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="27" name="27" id="27"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(27)" for="27"><label>Placement</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="28" name="28" id="28"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(28)" for="28"><label>Branded</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="29" name="29" id="29"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(29)" for="29"><label>Endorsed</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="30" name="30" id="30"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(30)" for="30"><label>Delivery</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="31" name="31" id="31"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(31)" for="31"><label>Evaluation</label></a><br>
         <input type="checkbox" checked class="toggle-vis" value="32" name="32" id="32"><a class="toggle-vis1" style="padding:4px;text-decoration: none;" onclick="check(32)" for="32"><label>Spot Grade</label></a><br>-->
    </div>
</div>