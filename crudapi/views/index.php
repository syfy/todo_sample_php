<!DOCTYPE html>
<html lang="en">
<head>
<!-- The jQuery library is a prerequisite for all jqSuite products -->
<script type="text/ecmascript"
	src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<!-- We support more than 40 localizations -->
<script type="text/ecmascript"
	src="resources/bower_components/jqGrid/js/minified/i18n/grid.locale-en.js"></script>
<!-- This is the Javascript file of jqGrid -->
<script type="text/ecmascript"
	src="resources/bower_components/jqGrid/js/jquery.jqGrid.min.js"></script>
<script type="text/ecmascript"
	src="resources/bower_components/jquery-ui/ui/widgets/datepicker.js"></script>

<script type="text/ecmascript"
	src="resources/bower_components/jquery-ui/jquery-ui.min.js"></script>




<link rel="stylesheet" href="/resources/demos/style.css">

<!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- The link to the CSS that the grid needs -->
<link rel="stylesheet" type="text/css" media="screen"
	href="resources/bower_components/jqGrid/css/ui.jqgrid-bootstrap.css" />
<script>
		$.jgrid.defaults.width = 780;
		$.jgrid.defaults.styleUI = 'Bootstrap';
	</script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<meta charset="utf-8" />
<title>jqGrid Loading Data - Virtual mode - paging with scrollbar</title>
</head>
<body>
	<div style="margin-left: 20px">
		<table id="jqGrid"></table>
		<div id="jqGridPager"></div>
	</div>
	<script type="text/javascript"> 


		var serverIp = "127.0.0.1";
		var projectName = "crudapi";

    
        $(document).ready(function () {


            
            $("#jqGrid").jqGrid({
                url: 'http://'+serverIp+'/'+projectName+'/controller/task_get_all.php',

                 mtype: "GET",
                datatype: "json",
                colModel: [
                    { label: 'Id', name: 'id', key: true, width: 75,sortable: false ,editable:true,hidden:true},
                    { label: 'task', name: 'task', width: '100%' ,sortable: false,editable:true},
                    {label: 'date', name: 'date', width: '30%' ,sortable: false,editable:true ,


                    	editoptions:{size:20, 
                            dataInit:function(el){ 
                                  $(el).datepicker({dateFormat:'yy-mm-dd'}); 
                            }, 
                            defaultValue: function(){ 
                              var currentTime = new Date(); 
                              var month = parseInt(currentTime.getMonth() + 1); 
                              month = month <= 9 ? "0"+month : month; 
                              var day = currentTime.getDate(); 
                              day = day <= 9 ? "0"+day : day; 
                              var year = currentTime.getFullYear(); 
                              return year+"-"+month + "-"+day; 
                            } 
                          } 








                        }
                       
                ],
				page: 1,
				 pgtext: null,  
				    pgbuttons: false,     // disable page control like next, back button
				    viewrecords: false,     
				    autowidth:true,
				    height: window.innerHeight*.70,
                rowNum: Infinity,
				scrollPopUp:true,
				scrollLeftOffset: "83%",
	
                scroll: 0, // set the scroll property to 1 to enable paging with scrollbar - virtual loading of records
                pager: "#jqGridPager"

            });


    



            $('#jqGrid').navGrid('#jqGridPager',
                    { edit: true, add: true, del: true, search: false, refresh: false, view: false, position: "left", cloneToTop: false },

                    {url: 'http://'+serverIp+'/'+projectName+'/controller/task_edit_page.php',
                    	  editCaption: "Edit",
                          recreateForm: true,
      					checkOnUpdate : true,
      					checkOnSubmit : true,
                          closeAfterEdit: true,
                      	


                        },
                        
                    {url: 'http://'+serverIp+'/'+projectName+'/controller/task_add_page.php',
                    		
                          recreateForm: true,
      					checkOnUpdate : true,
      					checkOnSubmit : true,
                          closeAfterAdd: true,

                            },
                    {url: 'http://'+serverIp+'/'+projectName+'/controller/task_delete_page.php',
                            	reloadAfterSubmit:true,
                                closeAfterDelete: true,
                                onclickSubmit: function(rp_ge, rowid) {
                                    // delete row
               					 var grid = jQuery("#jqGrid");
                                    grid.delRowData(rowid);
                                    // reload 

                                    if (grid[0].p.lastpage > 1) {
                                        // reload grid to make the row from the next page visable.
                                        // TODO: deleting the last row from the last page which number is higher as 1
                                        grid.trigger("reloadGrid", [{page:grid[0].p.page}]);
                                    }

                                    return true;
               			                     
               				                 }

                                },



                    
	                   );
         
        });





    </script>


</body>
</html>