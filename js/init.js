$(document).ready( function () {
    $('.login').validate({
        rules: {
            username: {
                required:true
            },
            password: {
                required:true
            }
        },
        messages: {
            username: 'Username is required',
            password: 'Password is required'
        },
        errorClass: 'border-red-500 text-xs italic text-red-500',
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('.register').validate({
        rules: {
            firstname: {
                required:true
            },
            lastname: {
                required:true
            },
            birthday: {
                required:true
            },
            course: {
                required:true
            },
            email: {
                required:true,
                email:true
            },
            username: {
                required:true
            },
            password: {
                required:true,
                minlength: 8
            }
        },
        messages: {
            firstname: 'First Name is required',
            lastname: 'Last Name is required',
            birthday: 'Birthday is required',
            course: 'Course is required',
            email: 'Email is required',
            username: 'Username is required',
            password: {
                required: 'Password is required',
                minlength: jQuery.validator.format('At least {0} characters required!')
            }
        },
        errorClass: 'border-red-500 text-xs italic text-red-500',
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('.datatable').DataTable({
        ajax: '/includes/route.php?type=get',
        columns: [
            { data: 'Studentid'},
            { data: 'Username'},
            { data: 'Firstname'},
            { data: 'LastName'},
            { data: 'Course'},
            { data: 'Studentid',
                fnCreatedCell: function (td, Studentid) {
                    $(td).html('<div class="text-right"><a href="update.php?Studentid='+Studentid+'" title="Edit this record">Update</a> | <a href="delete.php?Studentid='+Studentid+'" class="text-danger" title="Delete this record" @click="showModal = true">Delete</a></div>');
                }
            }
        ],
        columnDefs: [ {
            targets: [6],
            orderable: false
        }]
    });

    $('.form').validate({
        rules: {
            firstname: {
                required:true
            },
            lastname: {
                required:true
            },
            birthday: {
                required:true
            },
            course: {
                required:true
            },
            email: {
                required:true,
                email:true
            },
            username: {
                required:true
            },
            password: {
                required:true,
                minlength: 8
            }
        },
        messages: {
            firstname: 'First Name is required',
            lastname: 'Last Name is required',
            birthday: 'Birthday is required',
            course: 'Course is required',
            email: 'Email is required',
            username: 'Username is required',
            password: {
                required: 'Password is required',
                minlength: jQuery.validator.format('At least {0} characters required!')
            }
        },
        errorClass: 'border-red-500 text-xs italic text-red-500',
        submitHandler: function(form) {
            form.submit();
        }
        
    });
});
