<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Collect Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container-fluid">
        <form action="" method="POST" id="form-data">
            <div class="row mt-4">
                <div class="col-lg-4 col-md-4 col-12">
                    <select class="form-control" name="type" id="type">
                        <option>Select Student Type</option>
                        <option value="present">Runnig Student</option>
                        <option value="ex">Ex Student</option>
                        <option value="family">Family Member</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <input type="text" class="form-control" placeholder="Enter Registration ID" name="reg_id" id="reg_id">
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <input type="submit" class="btn btn-info btn-sm" value="Show">
                </div>
            </div>
        </form>
        <div class="return_data">

        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script>

    $(document).ready(function(){

        $("#form-data").on('submit',function(e){
        
            e.preventDefault();

            var type = $('#type').val();
            var reg_id = $('#reg_id').val();

            // alert(type);

            $.ajax({
                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{url('getImage')}}',

                type : 'POST',

                data : {type,reg_id},

                success : function(data)
                {
                    $('.return_data').html(data);
                }
            });


        });

    });

</script>
</body>
</html>