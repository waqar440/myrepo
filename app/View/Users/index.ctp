
   <?php $this->Html->script('jquery',FALSE); ?>
   <?php
   
   
     echo $this->Form->create(array('url'=>'import','type'=>'file'));
     echo $this->Form->input('file',array('type'=>'file'));
     echo $this->Form->submit('submit');
    echo "<pre>";
    print_r($data);
    echo "</pre>";
   ?>


   <!-- <div class="g-signin2" id="sign" data-onsuccess="onSignIn" data-theme="dark"></div> -->
   <script>               
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log(profile);
                if(profile){
                    $.ajax({
                        method: "post",
                        url: "users/add",
                        data:profile,
                        success: function (response) {
                            alert(response);
                        }
                    });
                }
            }                    
   </script>
 