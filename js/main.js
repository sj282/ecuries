'use strict';

function showCustomers(data)
{
    $('tbody').html(data);
}

function onSelectOrderBy()
{ 
    var value = $(this).val();
    $.get("index.php?page=admin&filter=" + value, showCustomers);
    // checkDate();
}

function onDeleteContact(event)
{
    event.preventDefault();
    var contactSelected = $('input[type="checkbox"]:checked');
    var totalContactSelected = [];
    for(var i = 0; i < contactSelected.length; i++)
    {
        totalContactSelected.push(contactSelected[i].value); 
    }

    $.ajax({
        type: "POST",
        url: "index.php",
        data: {
            contactsId : JSON.stringify(totalContactSelected),
            action :"deleteContacts"
        },
    });
    contactSelected.parentsUntil('tbody').remove();
}

// CODE PRINCIPAL

$(function () {
    
    $('#selectOrderBy').on('change', onSelectOrderBy).trigger("change");
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoHeight: true,
        margin: 20,
        autoplay: false,
        nav: true
    });
    $('#btn_delete button').on('click', onDeleteContact);
})
