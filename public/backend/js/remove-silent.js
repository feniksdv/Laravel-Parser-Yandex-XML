let select = document.querySelectorAll(".silent-remove1");
let btnSave = document.querySelectorAll(".silent-remove");
let orderStatusID;

select.forEach(el=>el.addEventListener('change', handler));
btnSave.forEach(el=>el.addEventListener('click', handlerSave));

function handler(e) {
    console.log(e.target.value);
    orderStatusID = e.target.value;
}

function handlerSave(e) {
    console.log(e.target.value);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/categories/'+e.target.value,
        dataType : 'html',
        type: 'get',
        data: {category: e.target.value},
        success:function(data) {
            console.log(data);
        }
    });
}

