$(document).ready(function() {
   
    let user = [];
    let selectedUsers = {};

    getUsers();
    function getUsers(){
        $.getJSON("./server.php",function(result){
            user= result.data;
            console.log(result.data);
            displayHTML();
        })
    };
    function displayHTML(){
        let markup = '';
        let size = user.length;
        for(let i =0;i<size;i++){
            let id = user[i].id;
            let name = user[i].username;
            let email = user[i].email;
            let address = user[i].address;
            let phone = user[i].phone;
            let birthday = user[i].birthday;
            let CMNDbefore = user[i].CMNDbefore;
            let CMNDafter = user[i].CMNDafter;
            markup = `
            <tr>
                <th scope = 'row'> ${id} </th>
                <td>${name}</td>
                <td>${email}</td>
                <td>${address}</td>
                <td>${phone}</td>
                <td>${birthday}</td>
                <td>${CMNDbefore}</td>
                <td>${CMNDafter}</td>
                <td><span class="edit-btn btn btn-success"  data-index = "${i}" data-toggle="modal" data-target="#edit-Modal">Confirm</span> <p></p><span class="del-btn btn btn-danger" data-index = "${i}" data-toggle="modal" data-target="#del-Modal">Delete</span> <p></p><span class="update-btn btn btn-primary"  data-index = "${i}" data-toggle="modal" data-target="#update-Modal">Update</span></td>
            </tr>
            `;
            $('#studentTbl > tbody:last-child').append(markup);
        }

        $('.edit-btn').click(function(){
            let index = $(this).data('index');
            selectedUsers =user[index];
        })
        $('.del-btn').click(function(){
            let index = $(this).data('index');
            selectedUsers = user[index];
        })
        $('.update-btn').click(function(){
            let index = $(this).data('index');
            selectedUsers = user[index];
        })
    }
    $('#deleteBtn').click(function(){
       $('#delete').val(selectedUsers.email);
    });

    $('#editBtn').click(function(){
       $('#confirm').val(selectedUsers.email);
    });
    $('#updateBtn').click(function(){
        $('#update').val(selectedUsers.email);
     });
})
