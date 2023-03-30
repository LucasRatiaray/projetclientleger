// owl carousel
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive : {
            0:{
                items:1
            },
            480:{
                items:2
            },
            768:{
                items:3
            },            
            991:{
                items:4
            },
            1024:{
                items:5
            }
        }
    });


// login

    $(function() {
        var dialog, form,
     
          // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
          emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
          username = $( "#inputUsername" ),
          password = $( "#inputPassword" ),
          allFields = $( [] ).add( username ).add( password ),
          tips = $( ".validateTips" );
     
        function updateTips( t ) {
          tips
            .text( t )
            .addClass( "ui-state-highlight" );
          setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );
          }, 500 );
        }
     
        function checkLength( o, n, min, max ) {
          if ( o.val().length > max || o.val().length < min ) {
            o.addClass( "ui-state-error" );
            updateTips( "Le mot de passe doit être compris entre " +
              min + " et " + max + " caractères." );
            return false;
          } else {
            return true;
          }
        }
     
        function checkRegexp( o, regexp, n ) {
          if ( !( regexp.test( o.val() ) ) ) {
            o.addClass( "ui-state-error" );
            updateTips( n );
            return false;
          } else {
            return true;
          }
        }

        //Fonction de connection au site
        function seConnecter() {

          var valid = true;
          allFields.removeClass( "ui-state-error" );

          // valid = valid && checkLength( username, "username", 3, 16 );
          // valid = valid && checkLength( password, "password", 5, 16 );
          // valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Que des lettres et des chiffres." );

          if ( valid ) {

           var dataReq = {};
           dataReq['loginParam'] = $("#inputUsername").val();
           dataReq['passwdParam'] = $("#inputPassword").val()
           
            $.post("/login", dataReq, function(dataResp, status){

              console.log("Data: " + dataResp + "\nStatus: " + status);
              $("div#dialog-form").html("");
              $("div#dialog-form").html(dataResp);
              // dialog.dialog( "close" );
            });
           
            ;
          }
          return valid;
        }
     
     
        dialog = $( "#dialog-form" ).dialog({
          autoOpen: false,
          height: 400,
          width: 350,
          modal: true,
          buttons: {
            "Se connecter": seConnecter,
            Cancel: function() {
              dialog.dialog( "close" );
            }
          },
          close: function() {
            form[ 0 ].reset();
            allFields.removeClass( "ui-state-error" );
          }
        });
     
        form = dialog.find( "form" ).on( "submit", function( event ) {
          event.preventDefault();
          addUser();
        });
     
        $( "#login-btn" ).on( "click", function() {
          dialog.dialog( "open" );
        });
      } );


  });