<script type="text/javascript" src="<?php print($this->basepath); ?>libraries/js/jquery.slider/jquery.slider.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php print($this->basepath); ?>libraries/js/jquery.slider/jquery.slider.css" media="all" />


<script type="text/javascript" src="<?php print($this->basepath); ?>libraries/js/simplemodal-demo-basic-1.4.2/js/jquery.simplemodal.js"></script>

<!-- Page styles 
<link type='text/css' href='<?php print($this->basepath); ?>libraries/js/simplemodal-demo-basic-1.4.2/css/demo.css' rel='stylesheet' media='screen' />
-->
<!-- Contact Form CSS files -->
<link type='text/css' href='<?php print($this->basepath); ?>libraries/js/simplemodal-demo-basic-1.4.2/css/basic.css' rel='stylesheet' media='screen' />

<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='<?php print($this->basepath); ?>libraries/js/simplemodal-demo-basic-1.4.2/css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->


<script type="text/javascript">
function loadMessages_me_inbox_only(){
  $.post("<?php print($this->basepath); ?>message/user/loadmessages", {}, function(data){
    var all_messages = eval('('+data+')');

    var html_ = '';
    
    for(i = 0; i < all_messages.msg_me.length; i++){
      // alert(all_messages.msg_home[i]['time']);
      html_ = html_ + "<div class='msg_me' id='msgme1_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:40px; height:40px; float:left;'><img src='<?php print($this->basepath); ?>user_generated_data/profile_picture/"+all_messages.msg_me[i]['profile_picture']+"' style='max-width:40px; max-height:40px;' /></div>";
      html_ = html_ + "<div class='msg_me' id='msgme2_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:5px; height:40px; float:left;'>&nbsp;</div>";
      html_ = html_ + "<div class='msg_me' id='msgme3_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:175px; height:40px; float:left;'><div style='width:175px; height:14px; float:left; color:#fff;'>"+all_messages.msg_me[i]['fullname']+"</div><div style='width:175px; height:26px; float:left; overflow: hidden; font-size:80%;'>"+$.trim(all_messages.msg_me[i]['description'])+"</div></div>";

      html_ = html_ + "<div class='msg_me' id='msgme4_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:220px; float:left; color:#fff;'>"+all_messages.msg_me[i]['shout']+"</div>";
      html_ = html_ + "<div class='msg_me' id='msgme5_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:220px; height:0px; float:left;'>&nbsp;</div>";
      
      html_ = html_ + "<div class='msg_me' id='msgme6_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:220px; height:20px; float:left; font-size:80%;'>";
        html_ = html_ + "<div style='width:120px; float:left; height:20px; display:table;'>";
          html_ = html_ + "<span style='display:table-cell; vertical-align:bottom;'>"+all_messages.msg_me[i]['time_word']+"</span>";
        html_ = html_ + "</div>";
        html_ = html_ + "<div id='shoutoperation_" + all_messages.msg_me[i]['lilo_id'] + "' style='width:100px; float:left; height:20px; display: none; color:#079bc7;'>";
          html_ = html_ + "<span style='display:table-cell; vertical-align:bottom;'>";
            html_ = html_ + "<a class='shout_reply' id='shoutreply_" + all_messages.msg_me[i]['lilo_id'] + "' style='text-decoration:none;'><img id='shoutreplyicon_" + all_messages.msg_me[i]['lilo_id'] + "' src='<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.reply.png' />&nbsp;Reply</a>";
            html_ = html_ + "&nbsp;&nbsp;";
            html_ = html_ + "<a class='shout_delete' id='shoutdelete_" + all_messages.msg_me[i]['lilo_id'] + "' style='text-decoration:none;'><img id='shoutdeleteicon_" + all_messages.msg_me[i]['lilo_id'] + "' src='<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.delete.png' />&nbsp;Delete</a>";
          html_ = html_ + "</span>";
        html_ = html_ + "</div>";
      html_ = html_ + "</div>";
      
      html_ = html_ + "<div style='width:220px; height:15px; float:left;'>&nbsp;</div>";

    }
    
    $('#msg_content_me').html(html_);
    
    
    var html_ = '';
    
    for(i = 0; i < all_messages.msg_inbox.length; i++){
      // alert(all_messages.msg_home[i]['time']);
      html_ = html_ + "<div class='msg_inbox' id='msginbox1_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:40px; height:40px; float:left;'><img src='<?php print($this->basepath); ?>user_generated_data/profile_picture/"+all_messages.msg_inbox[i]['profile_picture']+"' style='max-width:40px; max-height:40px;' /></div>";
      html_ = html_ + "<div class='msg_inbox' id='msginbox2_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:5px; height:40px; float:left;'>&nbsp;</div>";
      html_ = html_ + "<div class='msg_inbox' id='msginbox3_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:175px; height:40px; float:left;'><div style='width:175px; height:14px; float:left; color:#fff;'>"+all_messages.msg_inbox[i]['fullname']+"</div><div style='width:175px; height:26px; float:left; overflow: hidden; font-size:80%;'>"+$.trim(all_messages.msg_inbox[i]['description'])+"</div></div>";

      html_ = html_ + "<div class='msg_inbox' id='msginbox4_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:220px; float:left; color:#fff; text-align:justify; text-justify: newspaper;'>"+all_messages.msg_inbox[i]['dm']+"</div>";
      html_ = html_ + "<div class='msg_inbox' id='msginbox5_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:220px; height:5px; float:left;'>&nbsp;</div>";
      
      
      
      html_ = html_ + "<div class='msg_inbox' id='msginbox6_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:220px; height:20px; float:left; font-size:80%;'>";
        html_ = html_ + "<div style='width:120px; float:left; height:20px; display:table;'>";
          html_ = html_ + "<span style='display:table-cell; vertical-align:bottom;'>"+all_messages.msg_me[i]['time_word']+"</span>";
        html_ = html_ + "</div>";
        html_ = html_ + "<div id='shoutoperation_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='width:100px; float:left; height:20px; display: none; color:#079bc7;'>";
          html_ = html_ + "<span style='display:table-cell; vertical-align:bottom;'>";
            html_ = html_ + "<a class='shout_reply' id='shoutreply_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='text-decoration:none;'><img id='shoutreplyicon_" + all_messages.msg_inbox[i]['lilo_id'] + "' src='<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.reply.png' />&nbsp;Reply</a>";
            html_ = html_ + "&nbsp;&nbsp;";
            html_ = html_ + "<a class='shout_delete' id='shoutdelete_" + all_messages.msg_inbox[i]['lilo_id'] + "' style='text-decoration:none;'><img id='shoutdeleteicon_" + all_messages.msg_inbox[i]['lilo_id'] + "' src='<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.delete.png' />&nbsp;Delete</a>";
          html_ = html_ + "</span>";
        html_ = html_ + "</div>";
      html_ = html_ + "</div>";
      
      html_ = html_ + "<div style='width:220px; height:15px; float:left;'>&nbsp;</div>";
      
      

    }
    
    $('#msg_content_inbox').html(html_);

    
    
  });
  
  
}


$(document).ready(function(){
  
  //$('.msg_me').live('click', function(){
  //  var _id = $(this).attr('id');
  //  alert(_id);
  //});

  $(".msg_me").live(
    {
      mouseenter:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
//        alert("Entering: " + _id_split[1]);
        $('#shoutoperation_' + _id_split[1]).show();
        $('#shoutoperation_' + _id_split[1]).css('display', 'table');
      },
      mouseleave:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
//        alert("Leaving: " + _id_split[1]);
        $('#shoutoperation_' + _id_split[1]).hide();
      }
    }
  );
  
  $(".shout_reply").live(
    {
      mouseenter:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
//        alert("Entering: " + _id_split[1]);
        $('#shoutreplyicon_' + _id_split[1]).attr('src', '<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.reply.hover.png');
      },
      mouseleave:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
//        alert("Leaving: " + _id_split[1]);
        $('#shoutreplyicon_' + _id_split[1]).attr('src', '<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.reply.png');
      },
      
      click:function (e) {
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
        $('#shout_id').val(_id_split[1]);
        $('#reply_status_form').modal({closeClass:'close_reply_modal_dialog', close: false, escClose: true});
        return false;
      },
      
    }
  );
  
  $(".shout_delete").live(
    {
      mouseenter:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
//        alert("Entering: " + _id_split[1]);
        $('#shoutdeleteicon_' + _id_split[1]).attr('src', '<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.delete.hover.png');
      },
      mouseleave:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
//        alert("Leaving: " + _id_split[1]);
        $('#shoutdeleteicon_' + _id_split[1]).attr('src', '<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/shout.delete.png');
      },
      click:function(){
        var _id = $(this).attr('id');
        var _id_split = _id.split('_');
        if(confirm('Are you sure to delete this shout?')){
          $('.loading_div').show();
          $.post("<?php print($this->basepath); ?>message/user/shout_delete/" + _id_split[1], {}, function(data){
            if(data == "1"){
              loadMessages_me_inbox_only();
            } else {
              alert(data);
            }
          });
          $('.loading_div').hide();
        }
      }
    }
  );
  
  // modal dialog untuk status
	$('#write_status_btn').click(function (e) {
		$('#write_status_form').modal({closeClass:'close_modal_dialog', close: false, escClose: true});
		return false;
	});

  
  
  $('#slider').slider({showControls: false, showProgress: true, hoverPause: true, wait: 12000});
  
  $('#write_status_btn').hover(
    function() {
      //$(this).addClass('ui-state-hover');
      $(this).attr('src', '<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/write.status.hover.png');
    }, 
    function() {
      //$(this).removeClass('ui-state-hover');
      $(this).attr('src', '<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/write.status.png');
    }
  );

//  $('#write_status_btn').live('click', function(){
//    $('#write_status_form').toggle();
//  });
  
  loadMessages_me_inbox_only();
  
  $('#btn_shout').live('click', function(){
    var shout = $('#shout').val();// alert("Your shout: " + shout);
    var session_id = $('#session_id').val();
    var circle = $('#circle').val();
    
    $.post("<?php print($this->basepath); ?>message/user/shout", {shout: shout, session_id: session_id, circle: circle}, function(data){
      if($.trim(data) == "OK"){
        loadMessages_me_inbox_only();
        $('#shout').val('');
      } else {
      }
    });
    $.modal.close();
  });

  
  $('#btn_reply').live('click', function(){
    var comment = $('#comment').val();// alert("Your shout: " + shout);
    var session_id = $('#session_id').val();
    var circle = $('#circle').val();
    var shout_id = $('#shout_id').val();
    
    $.post("<?php print($this->basepath); ?>message/user/shout_reply", {comment: comment, session_id: session_id, circle: circle, shout_id: shout_id}, function(data){
      if($.trim(data) == "OK"){
        loadMessages_me_inbox_only();
        $('#comment').val('');
        $.modal.close();
      } else {
        alert(data);
      }
    });
  });
  
    
  $('#tab_stream').live('click', function(){
    $(this).removeClass('tab_non_active');
    $(this).addClass('tab_active');
    $('#tab_inbox').addClass('tab_non_active');
    $('#tab_inbox').removeClass('tab_active');
  
  
    $('#msg_content_inbox').hide();
    $('#msg_content_me').show();
  
  });
  
  
  
  $('#tab_inbox').live('click', function(){
    $(this).removeClass('tab_non_active');
    $(this).addClass('tab_active');
    $('#tab_stream').addClass('tab_non_active');
    $('#tab_stream').removeClass('tab_active');
  
  
    $('#msg_content_me').hide();
    $('#msg_content_inbox').show();
  
  });
  
  
  function heartBeat(){
    loadMessages_me_inbox_only();
  }
  
  setInterval(heartBeat, <?php echo isset($this->heartBeatInterval) ? $this->heartBeatInterval : "60000"; ?>);

});


function draw_stars(count){
  for(var i = 0; i < count; i++){
    document.write("<img src='<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/star.on.png'>");
  }
  for(var i = count; i < 5; i++){
    document.write("<img src='<?php print($this->basepath); ?>modules/000_user_interface/images_popbloopdark/icons/star.off.png'>");
  }
}

</script>

<style type="text/css">
#write_status_btn{
  cursor: pointer;
}

.tab_active{
  color: #07acdc;
  cursor: pointer;
}

.tab_non_active{
  color: #ccc;
  cursor: pointer;
}

.major_achievement{
  background-color: #333;
  width: 130px;
  height: 170px;
  margin: 2px;
  float: left;
  
  position: relative;
}

.minor_achievement{
  background-color: #333;
  width: 70px;
  height: 70px;
  margin: 2px;
  float: left;
  margin-top: 62px;
  padding-top: 40px;
  
  position: relative;
}

.major_achievement_label{
  position: absolute;
  bottom: 0;
  background-color: #1f1f1f;
  width: 130px;
  height: 40px;
  font-size: 9px;
  text-align: center;
  
  display: table;
}

.major_achievement_label span{
  display: table-cell;
  vertical-align: middle;
}




.minor_achievement_label{
  position: absolute;
  bottom: 0;
  background-color: #1f1f1f;
  width: 70px;
  height: 40px;
  font-size: 8px;
  text-align: center;
  
  display: table;
}

.minor_achievement_label span{
  display: table-cell;
  vertical-align: middle;
}


</style>

<div class="withjs">

<div class="container_12 pop_20_spacer">
</div>

<div class="container_12">
  <div class="grid_9">
    <div style="height: 30px; border-bottom: solid 2px #333;">
      <div style="float: right; width: 90px; padding: 8px; color: #fff; font-size: 12px; background-color: #333; text-align: center; position: relative; bottom: 0; border: 0; margin-left: 2px;"><a href="<?php echo $this->basepath; ?>myavatar" style="text-decoration: none; color: #FFF;">Avatar Editor</a></div>
      <div style="float: right; width: 90px; padding: 8px; color: #fff; font-size: 12px; background-color: #333; text-align: center; position: relative; bottom: 0; border: 0;"><a href="<?php echo $this->basepath; ?>people" style="text-decoration: none; color: #FFF;">People</a></div>
      <div style="float: right; font-size: 28px; color: #fff; width: 485px;">Profile</div>
    </div>
    
    
    <div style="height: 187px; padding: 18px 0 0 0;">
      <div style="float: left; width: 187px; height: 187px; font-size: 28px; color: #fff; display: table;">
        <div style="display: table-cell; vertical-align: middle; text-align: center; background: url('<?php echo $this->basepath; ?>user_generated_data/profile_picture/<?php echo $this->user_property->profile_picture; ?>') center no-repeat">
          &nbsp;
          <?php /* ?>
          <img style="max-height: 187px; max-width: 187px" src="<?php echo $this->basepath; ?>user_generated_data/profile_picture/<?php echo $this->user_property->profile_picture; ?>" />
          <?php */ ?>
        </div>
      </div>
      
      
      <div id="slider" style="float: left; width: 513px; height: 187px;">
      
        <!--[slide 1]-->
        <div style="width: 513px; height: 187px; background-color: #464749; color: #FFF; font-size: 16px; display: table;">
          <div style="width: 15px; float: left; height: 187px; background: url('<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/left.tips.1f1f1f.png') center right no-repeat #1f1f1f;">
          </div>
          <div style="display: table-cell; vertical-align: top; text-align: center; float: left; width: 498px;">
            <div style="height: 20px; font-size: 24px; font-weight: bold; text-align: left; padding-left: 20px; padding-top: 20px;">
              <?php echo $this->user_property->fullname; ?>
              <span style="font-size: 12px; padding-left: 5px;"><?php echo $this->user_property->sex; ?>, <?php echo $this->user_property->age; ?></span>
            </div>
            <div style="height: 20px; padding-top: 14px; padding-left: 20px; font-size: 14px; color: #FFF; text-align: left;">
              <img style="height: 16px; width: 16px;" src="<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/online.png" />
              Fishing on a lake at <a style="color: #0F0; text-decoration: none;">PopBloop</a>
            </div>
            <div style="height: 20px; padding-top: 13px; padding-left: 20px; font-size: 18px; color: #FFF; text-align: left;">About</div>
            <div style="height: 50px; padding-top: 2px; padding-left: 20px; font-size: 13px; color: #FFF; text-align: left;"><?php echo $this->user_property->description; ?></div>
          </div>
        </div>
        <!--[slide 1 end]-->
        
        <!--[slide 2]-->
        <div style="width: 513px; height: 187px; color: #FFF; font-size: 16px; display: table;">
          <div style="width: 15px; float: left; height: 187px; background: url('<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/left.tips.png') center right no-repeat;">
          </div>
          <div style="display: table; text-align: center; float: left; width: 498px; height: 187px; background-color: #ff00aa">
            <div style="display: table-cell; vertical-align: middle; text-align: center;">
              <?php echo $this->user_property->state_of_mind; ?>
            </div>
          </div>
        </div>
        <!--[slide 2 end]-->
        
      </div>
    </div>

    <div class="clear"></div>
    
    <div style="height: 12px; padding-top: 20px; position: relative; background: url('<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/bottom.shadow.png') center no-repeat;">
    </div>
    
    <div class="clear"></div>

    <div style="height: 30px; padding: 0 0 10px 0; position: relative;">
      <span style="width: 75px; float: left; font-size: 24px; color: #FFF;">FAME</span>
      <span style="width: 150px; float: left; font-size: 16px; color: #FFF; padding-top: 2px;"><script type="text/javascript">draw_stars(3);</script></span>
      <span style="width: 100px; float: left; font-size: 16px; color: #FFF; padding-top: 8px;">FAVES 65</span>
      <span style="width: 100px; float: left; font-size: 16px; color: #FFF; padding-top: 8px;">FAVED 100</span>
    </div>

    <div class="clear"></div>

    
    
    <div style="height: 3px; border-bottom: solid 2px #333;">
    </div>
    
    <div style="height: 20px; padding: 20px 0 10px 0; font-size: 19px; color: #FFF;">Achievement
    </div>
    
    <div style="height: 20px; padding: 0 0 10px 0; font-size: 16px; color: #FFF;">Newest Achievement
    </div>
    
    <div style="height: 160px; display: table;">
      <div class="major_achievement"><div class="major_achievement_label"><span>Winner (Balap Lari)</span></div></div>
      <div class="major_achievement"><div class="major_achievement_label"><span>Bernyanyi</span></div></div>
      <div class="major_achievement"><div class="major_achievement_label"><span>Naik Gunung</span></div></div>
      
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
    </div>
    
    <div class="clear"></div>
    

    
    
    <div style="height: 3px; border-bottom: solid 2px #333;">
    </div>
    
    <div style="height: 20px; padding: 20px 0 10px 0; font-size: 19px; color: #FFF;">Reward
    </div>
    
    <div style="height: 20px; padding: 0 0 10px 0; font-size: 16px; color: #FFF;">Newest Ribbon
    </div>
    
    <div style="height: 150px; display: table;">
      <div class="major_achievement"><div class="major_achievement_label"><span>Winner (Balap Lari)</span></div></div>
      <div class="major_achievement"><div class="major_achievement_label"><span>Bernyanyi</span></div></div>
      <div class="major_achievement"><div class="major_achievement_label"><span>Naik Gunung</span></div></div>
      
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
    </div>
    
    <div class="clear"></div>
    

    
    
    
    <div style="height: 20px; padding: 0 0 10px 0; font-size: 16px; color: #FFF;">Newest Medal
    </div>
    
    <div style="height: 150px; display: table;">
      <div class="major_achievement"><div class="major_achievement_label"><span>Winner (Balap Lari)</span></div></div>
      <div class="major_achievement"><div class="major_achievement_label"><span>Bernyanyi</span></div></div>
      <div class="major_achievement"><div class="major_achievement_label"><span>Naik Gunung</span></div></div>
      
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
      <div class="minor_achievement"><div class="minor_achievement_label"><span>&nbsp;</span></div></div>
    </div>
    
    <div class="clear"></div>
    
  </div>
  <div class="grid_3">
  
    <div style="height: 40px; width: 172px; float: left;">
      <div style="height: 10px; width: 172px;"></div>
      
      <div style="height: 20px; width: 86px; text-align: center; float: left; font-size: 12px;" class="tab_active" id="tab_stream">Stream</div>
      <div style="height: 20px; width: 84px; text-align: center; float: left; font-size: 12px; border-left: solid 2px #666;" class="tab_non_active" id="tab_inbox">Inbox</div>
      
      <div style="height: 10px; width: 172px;"></div>
    </div>
    <div style="height: 40px; width: 48px; float: left;">
      <div style="height: 40px; width: 48px; text-align: right; float: left;"><img id="write_status_btn" src="<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/write.status.png" /></div>
    </div>
  
    <div class="clear"></div>
  
    
    <div id="msg_content_me" style="width: 220px; float: left; padding-top: 10px;"></div>
    <div id="msg_content_inbox" style="width: 220px; float: left; padding-top: 10px; display: none;"></div>
  
  </div>
</div>



<div id="write_status_form" style="display: none;">
  
  <div style="width: 90px; height: 78px; float: left; text-align: center; padding-top: 3px; display: table;">
    <div style="display: table-cell; vertical-align: middle;">
      <img style="max-height: 75px; max-width: 75px;" src="<?php echo $this->basepath; ?>user_generated_data/profile_picture/<?php echo $this->user_property->profile_picture; ?>" />
    </div>
  </div>
  <div style="width: 8px; height: 78px; float: left; padding-top: 3px; background: url(<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/left.tips.969595.png) center no-repeat;">&nbsp;
  </div>
  <div style="width: 388px; height: 78px; float: left; padding-top: 3px; text-align: right;">
    <input type="hidden" name="circle" id="circle" value="" />
    <textarea name="shout" id="shout" spellcheck="false" style="width: 388px; height: 75px; color: #FFF; background-color: #969595; border-radius:0px; border: 0; font-family: 'Droid Sans',sans-serif; font-size: 10px;" maxlength="500" placeholder="Shout"></textarea>
    <div style="height: 6px; width: 100%;">&nbsp;</div>
    <input type="button" name="btn_shout" id="btn_shout" value="Shout" style="border: 0; cursor: pointer; font-family: 'Droid Sans',sans-serif; font-size: 14px; background-color: #1f1f1f; color: #999; padding: 5px 15px;" />
  </div>
  <div style="width: 24px; height: 78px; float: left; padding-top: 3px; text-align: center">
    <img title="Close" style="cursor: pointer;" class="close_modal_dialog" src="<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/x.969595.png" />
  </div>
  <div class="clear"></div>
</div>


<div id="reply_status_form" style="display: none;">
  
  <div style="width: 90px; height: 78px; float: left; text-align: center; padding-top: 3px; display: table;">
    <div style="display: table-cell; vertical-align: middle;">
      <img style="max-height: 75px; max-width: 75px;" src="<?php echo $this->basepath; ?>user_generated_data/profile_picture/<?php echo $this->user_property->profile_picture; ?>" />
    </div>
  </div>
  <div style="width: 8px; height: 78px; float: left; padding-top: 3px; background: url(<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/left.tips.969595.png) center no-repeat;">&nbsp;
  </div>
  <div style="width: 388px; height: 78px; float: left; padding-top: 3px; text-align: right;">
    <input type="hidden" name="shout_id" id="shout_id" value="" />
    <input type="hidden" name="circle" id="circle" value="" />
    <textarea name="comment" id="comment" spellcheck="false" style="width: 388px; height: 75px; color: #FFF; background-color: #969595; border-radius:0px; border: 0; font-family: 'Droid Sans',sans-serif; font-size: 10px;" maxlength="500" placeholder="Reply shout"></textarea>
    <div style="height: 6px; width: 100%;">&nbsp;</div>
    <input type="button" name="btn_reply" id="btn_reply" value="Reply Shout" style="border: 0; cursor: pointer; font-family: 'Droid Sans',sans-serif; font-size: 14px; background-color: #1f1f1f; color: #999; padding: 5px 15px;" />
  </div>
  <div style="width: 24px; height: 78px; float: left; padding-top: 3px; text-align: center">
    <img title="Close" style="cursor: pointer;" class="close_reply_modal_dialog" src="<?php echo $this->basepath; ?>modules/000_user_interface/images_popbloopdark/icons/x.969595.png" />
  </div>
  <div class="clear"></div>
</div>


</div>