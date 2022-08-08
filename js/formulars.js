$(document).ready(function(){
    // First Page (Transferul Dosarelor Aprobate
    $('#isHomeAdress').click(function() {
        if($(this).is(":checked")) {
            $( ".homeAdress" ).css( "display", "none" );
        } else if($(this).is(":not(:checked)")) {
            $( ".homeAdress" ).css( "display", "block" );
        }
    });
    // First Page (Transferul Dosarelor Aprobate) END //

    // Second Page (Inscriere In Programul Casa Verde)
    $('#isBuildingAdress').click(function() {
        if($(this).is(":checked")) {
            $( ".buildingAdress" ).css( "display", "none" );
        } else if($(this).is(":not(:checked)")) {
            $( ".buildingAdress" ).css( "display", "block" );
        }
    });

    $('#isSecondRequestAFM').click(function() {
        if($(this).is(":checked")) {
            $( ".secondRequestAFM" ).css( "display", "block" );
        } else if($(this).is(":not(:checked)")) {
            $( ".secondRequestAFM" ).css( "display", "none" );
        }
    });

    $theId = 1;
    $(`#deleteParent-${$theId}`).click(function() { $(this).parent().remove(); });

    $(".coOwner_btn-add").click(function(){
        $theId++;

        $(".coOwner_btn-add").before(`
        <div>
            <h3 class="mb-1 mt-2"><b>Coproprietar</b></h3>
            <input type="text" name="" id="" class="form-control required mt-2 mb-2" value="" placeholder="Nume coproprietar">
            <input type="text" name="" id="" class="form-control required mt-2 mb-2" value="" placeholder="Prenume coproprietar">
            <input type="text" name="" id="" class="form-control required mt-2 mb-2" value="" placeholder="CNP coproprietar">
            <input type="text" name="" id="" class="form-control required mt-2 mb-2" value="" placeholder="Domiciliu coproprietar">
            <button id="deleteParent-${$theId}" class="btn text-white bg-danger text-decoration-none coOwner_btn mt-2 mb-0"><span class="align-items-center"><i class="icon-user-minus"></i></span>&nbsp; Sterge coproprietar</button>
        </div>
        `);

        $(`#deleteParent-${$theId}`).click(function() { $(this).parent().remove(); });
        
    });

    $('#isCoOwner').click(function() {
        if($(this).is(":checked")) {
            $( ".coOwner" ).css( "display", "block" );
            $( ".coOwner-btn" ).css( "display", "inline-block" );
        } else if($(this).is(":not(:checked)")) {
            $( ".coOwner" ).css( "display", "none" );
            $( "button[id^='deleteParent-']" ).parent().remove()
        }
    });

    $("input[name='data-plans-selected']").click(function() {
        $totalPlans = $('.pricing-box').length;
        for(i = 0; i <= $totalPlans; i++) {
            if($(`#data-plan-${i}`).is(":checked")) {
                $(`#data-plan-${i}`).parent().addClass('border-color')
            } else if($(`#data-plan-${i}`).is(":not(:checked)")) {
                $(`#data-plan-${i}`).parent().removeClass('border-color')
            }
        }
    });
    // Second Page (Inscriere In Programul Casa Verde) END //
});