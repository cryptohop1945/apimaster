<?php ob_start();session_start();
require('../_gb_classes/gb_main.php');

?>
<!DOCTYPE html>
    <html>
        <head>
            <meta itemscope itemtype="http://schema.org/Organization"><a itemprop="url" content="http://www.gabenta.com/apimaster/index.php" style="display:none">Gabenta Online</a>
        <meta itemprop="logo" content="http://www.gabenta.com/_gb_images/_gb_icon/apimaster-logo.png">
            
            <meta property="og:title" content="APIMaster" />
            <meta property="og:description" content="APIMaster is a testing tool designed by Gabenta specifically for developers whose having a hard time connecting with other's API during the test environment, basically it helps you saving time & be more productive." />
             <meta property="og:image" content="http://www.gabenta.com/_gb_images/_gb_icon/apimaster-logo.png" />
             
            <meta name="description" content="We can build , develop the entire website with qualty assurance.We can also make your website accessible in any platform, browser to satisfy your visitors." />
            <meta name="keywords" content="gabenta,develop website ,Website,website, website building, website developing, puerto princesa website, puerto princesa website building, puerto princesa software" />
           
           
             <meta name="description" content="APIMaster is a testing tool designed by Gabenta specifically for developers whose having a hard time connecting with other's API during the test environment, basically it helps you saving time & be more productive." />
            <meta name="content" content="apimaster , api , tool for api , gabenta apimaster , gabenta tool" />
            
            <title>API Master - Powered by Gabenta</title>
          
           <?php echo _imports(); ?>
           <script src="<?php echo _getaddress()?>_gb_plugin/nicescroll/jquery.nicescroll.js"></script>
          
           
        </head>
        <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=904735236226394&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

             <div class="gb-entire">
                <?php
                    echo _menu();
                ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++-->
                <!--++++++++++++++++++++++++++++++++++++++++++++-->

                <div class="gb-main">
                   
                    <div class="div-content">
                             <div class="div-title"><h1><span>API</span>Master</h1></div>
                                
                                <div class="apim-container default-content">
                                   
                                    <!--<div class="apim-logo">
                                        <div class="defini">
                                        <b>APIMaster</b> is a testing tool designed by <b>Gabenta</b> specifically for developers whose having a hard time connecting with other's API during the test environment, basically it helps you saving time & become more productive.
                                        </div>
                                        
                                        <img class="apimaster" src="<?php echo _getaddress(); ?>_gb_images/_gb_icon/apimaster-logo.png" />
                                    </div>-->
                                    <div style="text-align: left;padding: 5px;">
                                      <div class="fb-like" data-href="http://www.gabenta.com/apimaster" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
                                   
                                    </div>
                                    <div class="apim-row">
                                      
                                            <div class="div-logs">
                                                
                                            </div>
                                   
                                    </div>
                                    
                                     <div class="apim-row">
                                       <div class="apim-col">
                                            <select class="sel-apim-method">
                                                <option value="POST">POST</option>\
                                                <option value="GET" selected="selected">GET</option>
                                            </select>
                                        </div>
                                        <div class="apim-col">
                                            <input class="api-input url" placeholder="(http or https) ://www.example.com/sample-api.php?"/>
                                            <a href="" class="butt-options add"><img src="img/add.png" alt="add key" title="add key" /></a>
                                            <a href="" class="butt-options remove-last"><img src="img/remove.png" alt="remove last key" title="remove last key" /></a>
                                            <a href="" class="butt-options start"><img src="img/start.png" alt="Send" title="Send" /></a>
                                       </div>
                                      
                                     </div>
                                     <div class="apim-dynamic-container">
                                           
                                     </div>
                                     <div class="apim-go-up-holder">
                                        <a href="" class="butt-options go-up"><img src="img/go-up.png" alt="Go up" title="Go up" /></a>
                                     </div>
                                      <div class="apim-row response-holder">
                                          
                                      </div>
                                     
                                </div>
                                
                    </div>
                     <!--++++++++++++++++++++++++++++++++++++++++++++-->
                 <!--++++++++++++++++++++++++++++++++++++++++++++-->
                <?php
                  echo _footer();
                ?>
                </div>
                                
        </body>
        <script>
    $(document).ready(function()
                      {
                        api_master._index({});
                        
                      
                        });
    var api_master = new function()
    {
        this._vars = {
                "elem-key":[
                            '<div class="apim-row dynamic">',
                                ' <div class="apim-col">',
                                    '<input class="api-input key" placeholder="key"/>',
                                ' </div>',
                                  ' <div class="apim-col">',
                                    ' <input class="api-input val" placeholder="value"/>',
                                    '<a href="" class="butt-options remove"><img src="img/remove.png" alt="remove this key" title="remove this key"  /></a>',
                                ' </div>',
                            '</div>',    
                           ].join(""),
            };
        this._last_added_row = "";
        this._add_key=function(array_params)
        {
           var div = $(".apim-dynamic-container");
           div.append(api_master._vars['elem-key']);
           //apim-row dynamic
           
           var obj_arr = Array();
           var apim_row_dy = $(".apim-row.dynamic");
           $.each(apim_row_dy,function()
                  {
                    obj_arr.push($(this));
                    });
           
           var len = obj_arr.length;
           api_master._last_added_row= obj_arr[len-1];
           obj_arr[len-1].fadeIn(250,function()
                                 {
                                    var input = $(this).find("input");
                                    i_arr = Array();
                                    $.each(input,function(){
                                       i_arr.push($(this)); 
                                    });
                                     api_master._bind2({});
                                     
                                     /*var bd = $("body,html");
                                     bd.animate({
                                        "scrollTop": i_arr[0].offset().top
                                     },250,function(){
                                        i_arr[0].focus();
                                        });*/
                                    
                                 }
                                 );
           
           
        }
        this._remove=function(array_params)
        {
            var obj = array_params['object'];
            obj.fadeOut(350,function()
            {
                       $(this).remove();
            });
        }
        this._removelast=function(array_params)
        {
          
           var obj_arr = Array();
           var apim_row_dy = $(".apim-row.dynamic");
            
           $.each(apim_row_dy,function()
                  {
                     obj_arr.push($(this));
                    });
           
           var len = obj_arr.length;
           if (len>=1)
           {
            api_master._remove({"object": obj_arr[len-1]});
           }
           
           
        }
        this._bind2 = function(array_params)
        {
            //butt-options remove
            var a_remove = $(".butt-options.remove");
            a_remove.unbind();
            a_remove.bind({
                click: function()
                {
                   var parent = $(this).parent().parent();
                   api_master._remove({"object": parent});
                    return false;
                  
                }
            });
            
            var api_input = $(".api-input");
            api_input.unbind();
            api_input.bind({
               keypress: function(event)
               {
                 var evt = event.which;
                 if (evt==13)
                 {
                    var a_start = $(".butt-options.start");
                    a_start.click();
                 }
               }
            });
        }
        this._bind1 = function(array_params)
        {
            //butt-options add
            var add_key = $(".butt-options.add");
            add_key.bind({
                click: function()
                {
                    api_master._add_key({});
                    return false;
                }
            })
            //butt-options remove-last
            var remove_last_key = $(".butt-options.remove-last");
            remove_last_key.bind({
                click: function()
                {
                    api_master._removelast({});
                    return false;
                }
            });
            var send = $(".butt-options.start");
            send.bind({
                click: function()
                {
                    api_master._send({});
                    return false;     
                }
            });
            
            var go_up = $(".butt-options.go-up");
            go_up.bind({
                click: function()
                {
                    var i_url = $(".api-input.url");
                    var bd = $("body,html");
                    bd.animate({
                      "scrollTop": i_url.offset().top - 150
                    },300,function(){});
                    return false;     
                }
            });
            api_master._bind2({});
            
        }
        
        this._send=function(array_params)
        {
            //api-input url
            var i_url = $(".api-input.url");
            if (i_url.val()=='')
            {
                i_url.attr("style","background:rgba(255,0,0,.1);border:solid 1px red;");
                i_url.focus();
                return false;
            }
            i_url.attr("style","");
           
           var method = $(".sel-apim-method").val();
           var content_array = {};
           
           var i_val = $(".api-input.val");
           var bool = false;
           
           content_array['url']=encodeURIComponent(i_url.val());
           content_array['method'] = method;
           
           $.each(i_val,function()
                {
                    var parent = $(this).parent().parent();
                    var curr_val = $(this).val();
                    var curr_key = parent.find(".api-input.key").val();
                    if (curr_key!='')
                    {
                        content_array[encodeURIComponent(curr_key)] = encodeURIComponent(curr_val);
                        bool=true;
                       
                    }
                });
             var d = new Date;
            var dte = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + (d.getDay()+1) + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                       
           
           var json_data = {
            "apimaster-type":"request",
            "send-type":1,
           "url":content_array['url'],
           "method":method,
           "date" : dte,
           };
           if (bool==true)
           {
                 content_array["apimaster-type"]="request";
                 content_array["date"] = dte;
                 content_array['send-type'] = 2;  
                 json_data = JSON.parse(JSON.stringify(content_array));
                 
           }
           var div = $(".response-holder");
           div.html("");
           
           var bd = $("body,html");
           bd.animate({
            scrollTop : div.offset().top
            });
           $.ajax({
                url: "ajax/send.php",
                data: json_data,
                type: "POST",
                beforeSend: function(){
                    div.addClass("loading");
                    //div.html("Sending request...");
                },
                error:function(x ,t,r)
                {
                    div.removeClass("loading");
                    div.html(x + " " + t + " " +r);
                },
                success: function(response)
                {
                    div.removeClass("loading");
                    div.html(response);
                    api_master._read({});
                    
                }
           });
        }
        this._removeall=function(array_params)
        {
            $(".sel-apim-method").val("GET");
            $(".url").val("");
            $(".apim-row.dynamic").fadeOut(300,function(){
               $(this).remove(); 
            });
            $(".apim-dynamic-container").html("");
            
          
        }
        this._log_bind = function(array_params)
        {
            var a = $(".ul-logs a");
            a.unbind();
            a.bind({
                click:function()
                {
                    var data_hidden = decodeURIComponent($(this).attr("data-hidden"));
                   
                    api_master._removeall({});
                    
                   var data_obj = JSON.parse(data_hidden);
                   $.each(data_obj,function(key,val){
                    data_obj[decodeURIComponent(key)] = decodeURIComponent(val);
                   });
                   
                   $(".url").val(data_obj['url']);
                    $(".sel-apim-method").val(data_obj['method']);
                    delete data_obj['url'];
                    delete data_obj['method'];
                    delete data_obj['date'];
                    delete data_obj['send-type'];
                    
                    //_last_added_row
                    $.each(data_obj,function(key,val)
                           {
                            $(".butt-options.add").click();
                            var curr_row = api_master._last_added_row;
                            
                           var input1 = curr_row.find("input.key");
                            
                           
                            var input2 = curr_row.find("input.val");
                            
                            input1.val(key);
                            input2.val(val);
                            
                            });
                    
                    return false;
                }
            })
        }
        this._read=function(array_params)
        {
            var div = $(".div-logs");
            
            $.ajax({
                url: "ajax/send.php",
                type:"POST",
                data:{"apimaster-type":"read-logs"},
                beforeSend: function(){},
                error: function(x,t,r){div.html(x + " " + t + " " + r);},
                success: function(response)
                {
                    div.html(response);
                   var h = parseFloat(div.css("height"));
                  
                    if (h>=parseFloat("150px"))
                    {
                       div.css({
                        "height":"150px",
                        "overflow": "scroll"
                        });
                       
                       div.niceScroll();
                       
                    }
                    api_master._log_bind({});
                    
                    
                }
            });
        }
        
        this._index=function(array_params)
        {
            api_master._bind1({});
            
            api_master._read({});
        }
    }
        </script>
        <style>
          .ul-logs{
            display: block;
            
            margin: 0 auto;
           
        
           
          }
          .ul-logs li{
            padding: 5px;
            white-space: nowrap;
           
          }
          .ul-logs li a{
           
          }
          .ul-logs li:after{
            content:"";
            display: block;
            height: 1px;
            margin-top:2px;
            background:black;
            background: -moz-linear-gradient(left,transparent,rgba(0,0,0,.9));
            background: -webkit-linear-gradient(left,transparent,rgba(0,0,0,.9));
            background: -o-linear-gradient(left,transparent,rgba(0,0,0,.9));
            background: -ms-linear-gradient(left,transparent,rgba(0,0,0,.9));
          }
           .ul-logs li:last-child:after{
           background:transparent;
           }
            .div-logs{
                padding: 10px;
             
               background:#EAEAEA; 
             }
            .loading
            {
                height: 150px !important;
                background: url(img/loading.gif) center no-repeat !important;
            }
            .apim-logo 
            {
                text-align: left;
                background : url(img/city.jpg);
                min-height:150px;
                position: relative;
            }
            .apim-logo .defini{
                border-bottom-right-radius:3px;
                border-top-right-radius:3px;
                position: absolute;
                padding: 10px;
                text-align:justify;
                line-height: 20px;
                background:rgba(255,255,255,.7);
                margin: 5px;
                width:40%;
                min-height:100px;
                border:solid 1px silver;
                
                box-shadow: 0 4px 4px -3px rgba(0,0,0,.5);
                -webkit-box-shadow: 0 4px 4px -3px rgba(0,0,0,.5);
                -o-box-shadow: 0 4px 4px -3px rgba(0,0,0,.5);
                -ms-box-shadow: 0 4px 4px -3px rgba(0,0,0,.5);
                -moz-box-shadow: 0 4px 4px -3px rgba(0,0,0,.5);
            }
            .apim-logo img{
                position: absolute;
                top: 5px;
                right: 5px;
                width:100px;
                height: 100px;
                background:transparent;
                opacity: .5;
            }
            .apim-go-up-holder{
               padding:1px;
                text-align: right;
               
            }
            .apim-container
            {
              
                
             padding: 10px;

    list-style: none;
    margin: 0 auto;
    margin-bottom:15px;
    margin-top:15px;

    
    box-shadow:  0 4px 4px -3px rgba(0,0,0,.8),0 -4px 4px -3px rgba(0,0,0,.8);
    -webkit-box-shadow:  0 4px 4px -3px rgba(0,0,0,.8),0 -4px 4px -3px rgba(0,0,0,.8);
    -o-box-shadow:  0 4px 4px -3px rgba(0,0,0,.8),0 -4px 4px -3px rgba(0,0,0,.8);
    -moz-box-shadow:  0 4px 4px -3px rgba(0,0,0,.8),0 -4px 4px -3px rgba(0,0,0,.8);
    -ms-box-shadow:  0 4px 4px -3px rgba(0,0,0,.8),0 -4px 4px -3px rgba(0,0,0,.8);

           
            }
            .apim-container .apim-row{display:block; background:silver; padding: 5px;}
            .apim-container .apim-col{
                display: inline-block;padding: 5px;background:white;
                
            }
            .apim-container .apim-col:first-child{
                width:20%;
                
            }
            .apim-container .apim-col:last-child
            {
                width:75%;
               
            }
            
            .apim-container input, .apim-container select
            {
               
                font-size:15px;
                
                padding: 10px;
                border:solid 1px silver;
                border-left:solid 1px gray;
                border-bottom:solid 1px gray;
                width:90%;
                 
                transition: box-shadow .3s ease;
                -webkit-transition: box-shadow .3s ease;
                -o-transition: box-shadow .3s ease;
                -ms-transition: box-shadow .3s ease;
                -moz-transition: box-shadow .3s ease;
            }
            .apim-container input.url{
                width:75%;
            }
             .apim-container input:focus, .apim-container select:focus{
                box-shadow:inset 0 0 8px -4px rgba(0,0,0,.9);
             }
             .apim-container select{width:95%;}
            .apim-container .butt-options{
                display: inline-block;
                vertical-align: middle;
                margin-left:5px;
            }
             .apim-container .butt-options img{
                display: inline-block;
                vertical-align: middle;
                width:30px;height:30px;
                margin:5px;
             }
             .apim-dynamic-container{
               background:gray;
                padding: 10px;
             }
             .apim-row.response-holder{
                height:300px;
                
                background: white;
                padding: 10px;
                border:solid 1px silver;
                overflow: scroll;
                
                box-shadow: inset 1px 4px 4px -3px rgba(0,0,0,.7);
                -webkit-box-shadow: inset 1px 4px 4px -3px rgba(0,0,0,.7);
                -moz-box-shadow: inset 1px 4px 4px -3px rgba(0,0,0,.7);
                -ms-box-shadow: inset 1px 4px 4px -3px rgba(0,0,0,.7);
                -o-box-shadow: inset 1px 4px 4px -3px rgba(0,0,0,.7);
             }
             .apim-row.dynamic
             {
                margin-bottom:1px;
                display:none;
             }
             .apim-row.dynamic:first-child{
                 border-top-left-radius:3px;
                border-top-right-radius:3px;
             }
             .apim-row.dynamic:last-child{
                margin-bottom:0px;
                border-bottom-left-radius:3px;
                border-bottom-right-radius:3px;
                
             }
           
@media only screen and (max-width:900px)
{
    .apim-container .apim-col{
        width:90% !important;
        margin:  0 auto;
    }
    .apim-logo {
        
        min-height:inherit;
        padding: 5px;
    }
    .apim-logo .defini{
        width:auto;
       position: static;
        min-height: inherit !important;
    }
    .apim-logo img{
        display: none;
    }
}
        </style>
    </html>