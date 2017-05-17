<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>Stu-details</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <script src="js/bootbox.min.js"></script>
        <script src="js/ui-bootstrap-tpls-2.0.2.min"></script>
        <style>
        div.image{  background-image:url('images/1.jpg'); background-repeat: no-repeat;background-position: center;
                    background-size: cover;
        }
 
        .closebtn{
            border:1px solid red;
            width:30px;
            color:#d8f9ff;
        }
        .closebtn:hover{
              border:1px solid red;
            width:30px;
            background-color: red;
            color:white;
        }
        .deattach{
            color:red;
        }
        .deattach:hover{
            color:darkred;
        }
        .deattach:visited{
            color:red;
        }
        .deattach.morelink {
    text-decoration:none;
    outline: none;
}
        </style>
</head>
<body>
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-paperclip"></span> Attach File</button>
<span id="moretext"><span style='color: #000d1d;'><b>Attached File : </b></span><span style="color: red;"><b>No file chosen</b></span></span>

<!-- Modal -->
<div id="myModal" class="modal fade image" role="dialog" >
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content" style=" border:2px solid #266ff3;">
      <div class="modal-header" style="background-color:#000d1d ;border-bottom:3px solid #266ff3;">
        <button type="button" class="close btn closebtn" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Attach File</h3>
      </div>
      <div class="modal-body">
      <p>
        <div class="input-group">
       <i class="input-group-addon" data-toggle="popover" title="Attach File First" data-content="Click Here to Attach More Files"><span  style="font-size: 17px;" >1.</span></a></i>
         
        <input type="file" class="form-control" name="File1" id="file1" onchange="changestate()"/>
        <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile1"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile1" style="pointer-events:none; color:maroon;" onclick="deleteattach('file1')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                   
       </div><br />
       
        
	           <div id="collapseOne" class="panel-collapse collapse" role="tabpanel">
		          <div class="input-group">
                    <i class="input-group-addon" data-toggle="popover" title="Attach File Second" ><span  style="font-size: 17px;" >2.</span></a></i>
                    <input type="file" class="form-control" name="File2" id="file2" onchange="changestate()"/>
                    <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile2"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile2" style="pointer-events:none; color:maroon;" onclick="deleteattach('file2')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
         
                </div><br />
                <div class="input-group">
                    <i class="input-group-addon" data-toggle="popover" title="Attach File Third" ><span  style="font-size: 17px;" >3.</span></a></i>
                    <input type="file" class="form-control" name="File3" id="file3" onchange="changestate()"/>
                    <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile3"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile3" style="pointer-events:none; color:maroon;" onclick="deleteattach('file3')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
         
                </div><br />
                <div class="input-group">
                    <i class="input-group-addon" data-toggle="popover" title="Attach File Third" ><span  style="font-size: 17px;" >4.</span></a></i>
                    <input type="file" class="form-control" name="File4" id="file4" onchange="changestate()"/>
                    <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile4"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile4" style="pointer-events:none; color:maroon;" onclick="deleteattach('file4')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                </div><br />
                <div class="input-group">
                    <i class="input-group-addon" data-toggle="popover" title="Attach File Third" ><span  style="font-size: 17px;" >5.</span></a></i>
                    <input type="file" class="form-control" name="File5" id="file5" onchange="changestate()"/>
                    <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile5"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile5" style="pointer-events:none; color:maroon;" onclick="deleteattach('file5')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
         
                </div><br />
                
	           </div>
	          
		      
       

        </p> </div>
      <div class="modal-footer">
      <span style="float: left;">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				            <input type="button" class="btn btn-primary " id="attachmore" value="Attach More Files" onclick="changetext()"/>
			             </a></span>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="attach" onclick="addText()">Attach</button>
      
      </div>
    </div>

  </div>
</div>

  </body>

</html>
<script>
function deleteattach(str){
    if(str=="file1"){
    $('#file1').val("");
     $("#deattachfile1").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file2"){
    $('#file2').val("");
     $("#deattachfile2").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file3"){
    $('#file3').val("");
     $("#deattachfile3").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file5"){
    $('#file5').val("");
     $("#deattachfile5").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file4"){
    $('#file4').val("");
     $("#deattachfile4").attr("style", "pointer-events:none; color:maroon;");
        }
     
    changestate();
        
}
function changestate(){
    if(document.getElementById('file1').value.length>0){
        $('#deattachfile1').removeAttr("style");
        $("#ideattachfile1").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file1').value==""){
        $("#ideattachfile1").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file2').value.length>0){
        $('#deattachfile2').removeAttr("style");
        $("#ideattachfile2").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file2').value==""){
        $("#ideattachfile2").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file3').value.length>0){
        $('#deattachfile3').removeAttr("style");
        $("#ideattachfile3").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file3').value==""){
        $("#ideattachfile3").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file4').value.length>0){
        $('#deattachfile4').removeAttr("style");
        $("#ideattachfile4").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file4').value==""){
        $("#ideattachfile4").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file5').value.length>0){
        $('#deattachfile5').removeAttr("style");
        $("#ideattachfile5").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file5').value==""){
        $("#ideattachfile5").attr("title", "First, please Choose a file");
        }
    
}
function addText()
{   
    if(document.getElementById('file1').value=="" && document.getElementById('file2').value=="" && document.getElementById('file3').value=="" && document.getElementById('file4').value=="" && document.getElementById('file5').value=="")
    {document.getElementById('moretext').innerHTML = "<span style='color: blue;'><b>No file chosen</b></span>";
    }
    else{
        var str=""; var filename="";
        if(document.getElementById('file1').value.length>0){
            filename=document.getElementById('file1').value;
            str = filename.replace(/^.*[\\\/]/, '');
            str=str.concat(" , ");
        }
        if(document.getElementById('file2').value.length>0){
            filename="";
            filename=document.getElementById('file2').value;
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" , ");
            
        }
        if(document.getElementById('file3').value.length>0){
            filename="";
            filename=document.getElementById('file3').value;
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" , ");
            
        }
         if(document.getElementById('file4').value.length>0){
            filename="";
            filename=document.getElementById('file4').value;
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" , ");
            
        }
        if(document.getElementById('file5').value.length>0){
            filename="";
            filename=document.getElementById('file5').value;
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" , ");
            
        }
        str=str.substr(0,str.length-2);
    document.getElementById('moretext').innerHTML = "<span style='color: #000d1d;'><b>Attached File : </b></span><span style='color: #266ff3;'><b>"+str+"</b></span>";
    
    }
}
function changetext(){  // do something…
 var attach=document.getElementById("attachmore");
 if(attach.value=="Attach More Files")
 attach.value="Attach Less Files";
else if(attach.value=="Attach Less Files")
 attach.value="Attach More Files";

  }</script>