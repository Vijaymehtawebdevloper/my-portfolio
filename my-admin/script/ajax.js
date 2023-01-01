
$(document).ready(function (){

    // NAVIGATION
    let navbar = $("#ul li");
    navbar.each(function(){
        $(this).on("click", function(e){
            active();
            $(this).addClass("active")
        })
    })

    function active(){
        navbar.remove("active");
    }

    // chose file
    
    // console.log(navbar)
    var origin = window.location.origin;
    var path = window.location.pathname.split( '/' );
    var URL = origin+'/'+path[1]+'/';
    // BANNER SECTION CREATE
    $("#create").submit(function(e){
        e.preventDefault();
        $(".card-header").hide();
        let title = $("#main-title").val();
        let subTitle = $("#Sub-Title").val();
        let logoImage = $("#logo-img")[0].files[0];

        if(title == ""){
            $("#form-result").prepend("<div class = 'card-header bg-danger'> Title field is empty ! </div>");
        }else if(subTitle == ""){
            $("#form-result").prepend("<div class= 'card-header bg-danger'> Sub title field is empty !</div>");
        }else if (logoImage == undefined){
            $("#form-result").prepend("<div class= 'card-header bg-danger'> logo image field is empty !</div>");
        }else{
            let fd = new FormData();
            fd.append('title',  title);
            fd.append('subTitle', subTitle);
            // fd.append('bgImage', bgImage);
            fd.append('logoImage', logoImage);
            fd.append("create", 1);
            $.ajax({
                url : "php-files/header-section.php",
                type : "POST",
                data : fd,
                cache : false,
                contentType : false,
                processData : false,
                dataType : "json",

                success : function (response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#form-result').prepend('<div class="card-header bg-success">Product Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'my-admin/home.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#form-result').prepend('<div class="card-header bg-danger">'+res.error+'</div>');
                    }
                }

            })
            
            
        }
    })

    // BANNER SECTION UPDATE
    $("#edit").submit(function(e){
        e.preventDefault();
        $(".card-header").hide();
        let title = $("#main-title").val();
        let subTitle = $("#Sub-Title").val();
        let logoImage = $("#logo-img")[0].files[0];
        let id = $("#Edit").attr("data");
    
        if(title == ""){
            $("#form-result").prepend("<div class = 'card-header bg-danger'> Title field is empty ! </div>");
        }else if(subTitle == ""){
            $("#form-result").prepend("<div class= 'card-header bg-danger'> Sub title field is empty !</div>");
        }else if (logoImage == undefined){
            $("#form-result").prepend("<div class= 'card-header bg-danger'> logo image field is empty !</div>");
        }else{
            let fd = new FormData();
            fd.append('title',  title);
            fd.append('subTitle', subTitle);
            fd.append('logoImage', logoImage);
            fd.append('edit', 1);
            fd.append('id', id);
            $.ajax({
                url : "php-files/header-section.php",
                type : "POST",
                data : fd,
                cache : false,
                contentType : false,
                processData : false,
                dataType : "json",
    
                success : function (response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#form-result').prepend('<div class="card-header bg-success">Product Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'my-admin/home.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#form-result').prepend('<div class="card-header bg-danger">'+res.error+'</div>');
                    }
                }
    
            })
            
            
        }
    })

    // delete banner
    $('#delete-banner').on("click", function(){
        var tr = $(this);
        var id = $(this).attr('data-id');
        var title = $(this).attr('data-title');
        if(confirm('Are you Sure want to delete this')){
            $.ajax({
                url: 'php-files/header-section.php',
                type: 'POST',
                data: {delete_id:id,title:title},
                dataType: 'json',
                success: function(response){
                    var res = response;
                    if(res.hasOwnProperty('success')){
                        tr.parent().parent('tr').remove();
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#updateProduct').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            });
        }
    });

    // ABOUT SECTION CREATE
    $("#about").submit(function(e){
        e.preventDefault();
        $(".card-header").hide();
        let title = $('#title').val();
        let subtitle = $('#subtitle').val();
        let name = $('#name').val();
        let phoneNumber = $('#telnumber').val();
        let date = $('#date-input').val();
        let education = $('#education').val();
        let email = $('#email').val();
        let profile = $('#logo-img')[0].files[0];

        if(title == ""){
            $(".about-section").prepend("<div class =  'card-header bg-danger'>Title field is empty !</>");
        }else if(subtitle == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Sub-title field is empty !");
        }else  if(name == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Name field is empty !");
        }else  if(education == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Education field is empty !");
        }else if(email == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Email field is empty !");
        }else if(phoneNumber == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Phone number field is empty !");
        }else if (date == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Date field is empty !");
        }else if(profile == undefined){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Profile field is empty !");
        }else{
            let fd = new FormData();
                fd.append("title", title);
                fd.append("subtitle", subtitle);
                fd.append("name", name);
                fd.append("date", date);
                fd.append("education", education);
                fd.append("email", email);
                fd.append("profile", profile);
                fd.append("phoneNumber", phoneNumber);
                fd.append("about", 1);
                
                $.ajax({
                    data : fd,
                    cache : false,
                    url : "php-files/about-section.php",
                    type : 'POST',
                    contentType : false,
                    processData : false,
                    dataType : 'json',

                    success:function(response){
                        $(".card-header").hide();
                        let res = response;
                        if(res.hasOwnProperty('success')){
                            $(".about-section").prepend("<div class = 'card-header bg-success'>data saved successfully in database !");
                            setTimeout(function(){ window.location = URL+'my-admin/about-section.php'; }, 1000);
                        }else if(res.hasOwnProperty("error")){
                            $(".about-section").prepend("<div class = 'card-header bg-danger'>here some error !"+res.response+"</div>");
                        }
                    }
                })
            
        }
    })

    // about section aupdate
    $("#about-edit").submit(function(e){
        e.preventDefault();
        $(".card-header").hide();
        let title = $('#title').val();
        let subtitle = $('#subtitle').val();
        let name = $('#name').val();
        let phoneNumber = $('#telnumber').val();
        let date = $('#date-input').val();
        let education = $('#education').val();
        let email = $('#email').val();
        let profile = $('#logo-img')[0].files[0];
        let dataid = $("#edit").attr("data-id");

        if(title == ""){
            $(".about-section").prepend("<div class =  'card-header bg-danger'>Title field is empty !</>");
        }else if(subtitle == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Sub-title field is empty !");
        let subtitle = $('#subtitle').val();
        }else if(name == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Name field is empty !");
        }else if(education == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Education field is empty !");
        }else if(email == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Email field is empty !");
        }else if(phoneNumber == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Phone number field is empty !");
        }else if (date == ""){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Date field is empty !");
        }else if(profile == undefined){
            $(".about-section").prepend("<div class = 'card-header bg-danger'> Profile field is empty !");
        }else{
            let fd = new FormData();
            fd.append("title", title);
            fd.append("subtitle", subtitle);
            fd.append("name", name);
            fd.append("phoneNumber", phoneNumber);
            fd.append("date", date);
            fd.append("education", education);
            fd.append("email", email);
            fd.append("profile", profile);
            fd.append("dataid", dataid);
            fd.append("about_edit", 1);
            
            $.ajax({
                data : fd,
                cache : false,
                url : "php-files/about-section.php",
                type : 'POST',
                contentType : false,
                processData : false,
                dataType : 'json',

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $(".about-section").prepend("<div class = 'card-header bg-success'>data saved successfully in database !");
                        setTimeout(function(){ window.location = URL+'my-admin/about-section.php'; }, 1000);

                    }else if(res.hasOwnProperty("error")){
                        $(".about-section").prepend("<div class = 'card-header bg-danger'>here some error !"+res.response+"</div>");
                    }
                }
            })
            
        }
    })

    // skill section create
    $("#skill").submit(function(e){
        e.preventDefault();
        $(".card-header").hide();
        let title = $("#title").val();
        let subtitle = $("#subtitle").val();
        let skillName = $("#skillName").val();
        let skillPercentage = $("#skillPercentage").val();

        if(title == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Title field is empty</div>")
        }else if(subtitle == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Sub-title field is empty</div>")
        }else if(skillName == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Skill-name field is empty</div>")
        }else if(skillPercentage == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Skill-percentage field is empty</div>")
        }else{
           
            let fd = new FormData();
            fd.append("title", title);
            fd.append("subtitle", subtitle);
            fd.append("skillName", skillName);
            fd.append("skillPercentage", skillPercentage);
            fd.append("skillSection", 1);

            $.ajax({
                type : "POST",
                cache : false,
                url : "php-files/skill-section.php",
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $(".skill-sesction").prepend("<div class = 'card-header bg-success'> data saved successfully in database ! </div>");
                        setTimeout (function(){ wiindow.location = URL+"my-admin/skill-section.php"},1000);
                    }else if(res.hasOwnProperty("error")){
                        $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })

     // skill section create
     $("#edit-skill").submit(function(e){
        e.preventDefault();

        $(".card-header").hide();
        let title = $("#title").val();
        let subtitle = $("#subtitle").val();
        let skillName = $("#skillName").val();
        let skillPercentage = $("#skillPercentage").val();
        let dataid = $("#edit").attr("data-id");

        if(title == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Title field is empty</div>")
        }else if(subtitle == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Sub-title field is empty</div>")
        }else if(skillName == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Skill-name field is empty</div>")
        }else if(skillPercentage == ""){
            $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Skill-percentage field is empty</div>")
        }else{
           
             let fd = new FormData();
             fd.append("title", title);
            fd.append("subtitle", subtitle);
            fd.append("skillName", skillName);
            fd.append("skillPercentage", skillPercentage);
            fd.append("dataid", dataid);
            fd.append("editskill", 1);

            $.ajax({
                type : "POST",
                cache : false,
                url : "php-files/skill-section.php",
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $(".skill-sesction").prepend("<div class = 'card-header bg-success'> data saved successfully in database ! </div>");
                        setTimeout (function(){ wiindow.location = URL+"my-admin/skill-section.php"},1000);
                    }else if(res.hasOwnProperty("error")){
                        $(".skill-sesction").prepend("<div class = 'card-header bg-danger'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })

    // service section create
    $("#service").submit(function(e){
        e.preventDefault();

        $(".card-header").hide();
        let title = $("#title").val();
        let subtitle = $("#SubTitle").val();
        let serviceName = $("#serviceName").val();
        let fonticon = $("#fonticon").val();
        let serviceInformation = $("#serviceInformation").val();
        let icon = $("#logo-img")[0].files[0];
        
        if(title == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Title field is empty</div>")
        }else if(subtitle == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Sub-title field is empty</div>")
        }else if(serviceName == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Service Name field is empty</div>")
        }else if(fonticon == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Font icon field is empty</div>")
        }else if(serviceInformation == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Service Information field is empty</div>")
        }else if(icon == undefined){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Icon field is empty</div>")
        }else{
           
            let fd = new FormData();
            fd.append("title", title);
            fd.append("subtitle", subtitle);
            fd.append("serviceName", serviceName);
            fd.append("serviceInformation", serviceInformation);
            fd.append("fonticon", fonticon);
            fd.append("icon", icon);
            fd.append("service", 1);

            $.ajax({
                type : "POST",
                cache : false,
                url : "php-files/service.php",
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $("#service-section").prepend("<div class = 'card-header bg-success'> data saved successfully in database ! </div>");
                        setTimeout (function(){ wiindow.location = URL+"my-admin/service.php"},1000);
                    }else if(res.hasOwnProperty("error")){
                        $("#service-section").prepend("<div class = 'card-header bg-danger'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })

    // service section create
    $("#edit-service").submit(function(e){
        e.preventDefault();

        $(".card-header").hide();
        let title = $("#title").val();
        let subtitle = $("#SubTitle").val();
        let serviceName = $("#serviceName").val();
        let fonticon = $("#fonticon").val();
        let serviceInformation = $("#serviceInformation").val();
        let dataid = $("#edit").attr("data-id");
        let icon = $("#logo-img")[0].files[0];

        if(title == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Title field is empty</div>")
        }else if(subtitle == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Sub-title field is empty</div>")
        }else if(serviceName == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Service Name field is empty</div>")
        }else if(fonticon == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Font icon field is empty</div>")
        }else if(serviceInformation == ""){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Service Information field is empty</div>")
        }else if(icon == undefined){
            $("#service-section").prepend("<div class = 'card-header bg-danger'> Icon field is empty</div>")
        }else{
           
            let fd = new FormData();
            fd.append("title", title);
            fd.append("subtitle", subtitle);
            fd.append("serviceName", serviceName);
            fd.append("fonticon", fonticon);
            fd.append("serviceInformation", serviceInformation);
            fd.append("icon", icon);
            fd.append("dataid", dataid);
            fd.append("ediService", 1);

            $.ajax({
                type : "POST",
                cache : false,
                url : "php-files/service.php",
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $("#service-section").prepend("<div class = 'card-header bg-success'> data saved successfully in database ! </div>");
                        location.reload();
                    }else if(res.hasOwnProperty("error")){
                        $("#service-section").prepend("<div class = 'card-header bg-danger'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })


    // create admin
    $("#admin").submit(function(e){
        e.preventDefault();

        $(".card-header").hide();
        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let retypepassword = $("#retypepassword").val();

        if(name == ""){
            $("#admin-section").prepend("<div class = 'card-header bg-danger'> Name field is empty</div>")
        }else if(email == ""){
            $("#admin-section").prepend("<div class = 'card-header bg-danger'> Email field is empty</div>")
        }else if(password == ""){
            $("#admin-section").prepend("<div class = 'card-header bg-danger'> Password field is empty</div>")
        }else if(retypepassword == ""){
            $("#admin-section").prepend("<div class = 'card-header bg-danger'> Retype Password field is empty</div>")
        }else if(password !== retypepassword){
            $("#admin-section").prepend("<div class = 'card-header bg-danger'> Password dose not match </div>")
        }else{
           
            let fd = new FormData();
            fd.append("name", name);
            fd.append("email", email);
            fd.append("password", password);
            fd.append("admin", 1);

            $.ajax({
                type : "POST",
                cache : false,
                url : "php-files/admin.php",
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $("#admin-section").prepend("<div class = 'card-header bg-success'> data saved successfully in database ! </div>");
                        setTimeout(function(){ wiindow.location = URL+"my-admin/admin.php"}, 1000);
                    }else if(res.hasOwnProperty("error")){
                        $("#admin-section").prepend("<div class = 'card-header bg-danger'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })
// admin login
    $("#adminLogin").submit(function(e){
        e.preventDefault();
        $(".card-header").hide();
        let email = $("#email").val();
        let password = $("#password").val();

        if(email == ""){
            $("#admin-login").prepend("<div class = 'card-header bg-danger'> Email field is empty</div>")
        }else if(password == ""){
            $("#admin-login").prepend("<div class = 'card-header bg-danger'> Password field is empty</div>")
        }else{
           
            let fd = new FormData();
            fd.append("email", email);
            fd.append("password", password);
            fd.append("adminLogin", 1);

            $.ajax({
                type : "POST",
                cache : false,
                url : "php-files/admin.php",
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $(".card-header").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $("#admin-login").prepend("<div class = 'card-header bg-success'> log in successfully  ! </div>");
                        setTimeout(function(){
                            $("#card").hide();
                            location.reload();
                        }, 1000)
                    }else if(res.hasOwnProperty("error")){
                        $("#admin-login").prepend("<div class = 'card-header bg-danger'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })
})
