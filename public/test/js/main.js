(function($) {

    var form = $("#signup-form");
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Prev',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            if(currentIndex === 0) {

                form.find('.content .body .step-current-content').find('.step-inner').removeClass('.step-inner-0');
                form.find('.content .body .step-current-content').find('.step-inner').removeClass('.step-inner-1');
                form.find('.content .body .step-current-content').append('<span class="step-inner step-inner-' + currentIndex + '"></span>');
            }
            if(currentIndex === 1) {
                form.find('.content .body .step-current-content').find('.step-inner').removeClass('step-inner-0').addClass('step-inner-'+ currentIndex + '');
            }
            return true;
        },
        onFinished: function(event, currentIndex) {
            var ps = [{formato,habilidad}];
            var error = 0;
            $(".fieldset-content").each(function(e){
                var pregunta = $(this).data('pre');
                var p = $(this).data('p');
                var r = $("input[type=radio][name=rr"+p+"]:checked").val();
                if (r == undefined) {
                    alert("Falta responder la pregunta "+pregunta);
                    error+=1;
                    return false;
                }
                ps.push({p,r});        
            });
            if (error==0) {
                console.log(ps);
                $.ajax({
                    url:'../examen',
                    data:{ps},
                    datatype:'json',
                    type:'POST',
                    success:function(response){
                        if (response.ver) {
                            $("fieldset").html("");
                            $(".actions").html("");
                            $("#div-nota").show();
                            $("#nota").html(response.nota);
                        }else{
                            $("fieldset").html("");
                            $(".actions").html("");
                        }
                        setTimeout(function(){ location.href="../certificar" }, 3000);
                        // console.log(response);

                    }
                });
                // alert('Sumited');
            }
        }
    });

    $(".toggle-password").on('click', function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

})(jQuery);