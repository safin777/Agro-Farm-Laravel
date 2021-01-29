<!DOCTYPE html>
<html>

<head>
    <title>Treatment List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">




    <style type="text/css">
    .scroll {

        width: 100%;
        height: 300px;
        overflow: scroll;
    }

    .table img {
        width: 45px;
        height: 45px;
        object-fit: contain;
        "

    }




    /* popup style */
    .bg-modal {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);

        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .modal-content {
        width: 500px;
        height: 450px;
        background-color: white;
        border-radius: 4px;
        text-align: center;
        padding: 20px;
        position: relative;
    }

    #popup1 input {
        width: 50%;
        display: block;

        margin: 15px auto;
    }


    .close {
        position: absolute;
        top 0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
    }


    /* edit popup style */
    .bg-modal2 {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);

        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .modal-content2 {
        width: 500px;
        height: 470px;
        background-color: white;
        border-radius: 4px;
        text-align: center;
        padding: 20px;
        position: relative;
    }

    #popup input {
        width: 50%;
        display: block;

        margin: 15px auto;
    }

    .close2 {
        position: absolute;
        top 0;
        right: 14px;
        font-size: 42px;
        transform: rotate(45deg);
        cursor: pointer;
    }
    </style>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>

    <header>
        @extends('admin/admin_layout')
    </header>

    @section('admin_content')



    </div>


    <div class="col-md-12" id="cart">
        <div class="box">
            <form action="" method="post">
                @csrf
                <legend>
                    <h1>Treatment Report</h1>
                </legend>
                <div>

                    <span class="pull-right">
                        <input type="text" name="search" placeholder="Search by Symptom" required>
                        <button class="btn btn-default" type="submit" formaction="{{url('/admin_searchtreatment')}}"
                            name="submit" value="submit" style="background-color: blue;color: white;">
                            <i class="fa fa-search"> Search</i>
                        </button>


                    </span>

                </div>
            </form>

            <br>
            <br>
            <br>


            <div class="table-responsive">
                <div class="scroll">

                    <table class='table table-bordered table-hover'>
                        <tr style='background-color: #9099f3;'>
                            <td>TREATMENT ID</td>
                            <td>TREATMENT NAME</td>
                            <td>SYMPTOM</td>
                            <td>PESTICIDE NAME</td>
                            <td>FERTILIZER NAME</td>

                            <td>ACTION</td>
                        </tr>
                        @foreach ($all_treatment as $treatment)
                        <tr>
                            <td>{{$treatment->Tid}}</td>
                            <td>{{$treatment->Tname}}</td>
                            <td>{{$treatment->Symptom}}</td>
                            <td>{{$treatment->Pname}}</td>
                            <td>{{$treatment->Frname}}</td>

                            <td>
                                <button class="btn btn-default edition" type="button"
                                    style="background-color: green;color: white;">
                                    <i class="fa fa-pencil-square-o"> Modify</i>
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>




            <div class="box-footer">

                <div class="pull-right">


                    <a href="#" class="btn btn-primary" id="add_item" style="background-color: red;">Add Item <i
                            class="fa fa-plus"></i></a>

                </div>


            </div><br><br>







            <div class="bg-modal2">
                <div class="modal-content2">

                    <div class="close2">
                        +
                    </div>


                    <form id="popup" method="POST" enctype="multipart/form-data">
                        @csrf


                        <input type="text" style="width: 50%;" name="Tid" id="Tid" placeholder="Treatment id" readonly>
                        <input type="text" style="width: 50%;" name="Tname" id="Tname" placeholder="Treatment name"
                            required>
                        <input type="text" style="width: 50%;" name="Symptom" id="Symptom" placeholder="Symptom"
                            required>
                        <input type="text" style="width: 50%;" name="Pname" id="Pname" placeholder="Pesticide name"
                            required>
                        <input type="text" style="width: 50%;" name="Frname" id="Frname" placeholder="Fertilizer name"
                            required>


                        <button class="btn btn-default fa fa-pencil-square-o"
                            formaction="{{url('/admin_updatetreatment')}}" type="submit" name="update_treatment"
                            style="background-color: green; color: white;">Update Treatment</button>
                        <button class="btn btn-default fa fa-trash" formaction="{{url('/admin_deletetreatment')}}"
                            type="submit" name="delete_treatment" class="fa fa-trash"
                            style="background-color: red;color: white;">Delete Treatment</button>
                    </form>


                </div>
            </div>





            <div class="bg-modal">
                <div class="modal-content">
                    <div class="close">
                        +
                    </div>


                    <form id="popup1" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="text" style="width: 50%;" required name="Tname" placeholder="Treatment Name">
                        <input type="text" style="width: 50%;" required name="Symptom" placeholder="Symptom">
                        <input type="text" style="width: 50%;" required name="Pname" placeholder="Pesticide name">
                        <input type="text" style="width: 50%;" required name="Frname" placeholder="Fertilizer name">

                        <button class="btn btn-default fa fa-plus" formaction="{{url('/admin_addtreatment')}}"
                            type="submit" name="add_treatment" style="background-color:slateblue; color: white;">Add
                            Treatment</button>
                    </form>

                </div>
            </div>





            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>


            <script type="text/javascript">
            document.getElementById('add_item').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'flex';

            });


            $(document).ready(function() {
                $('.edition').on('click', function() {


                    document.querySelector('.bg-modal2').style.display = 'flex';

                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);
                    $('#Tid').val(data[0]);
                    $('#Tname').val(data[1]);
                    $('#Symptom').val(data[2]);
                    $('#Pname').val(data[3]);
                    $('#Frname').val(data[4]);


                });

            });




            document.querySelector('.close').addEventListener('click', function() {
                document.querySelector('.bg-modal').style.display = 'none';

            });

            document.querySelector('.close2').addEventListener('click', function() {
                document.querySelector('.bg-modal2').style.display = 'none';

            });
            </script>
            <footer>
                @endsection
            </footer>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

            <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
            <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
            {!! Toastr::message() !!}

</body>

</html>