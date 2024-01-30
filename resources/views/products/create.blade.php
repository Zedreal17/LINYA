<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('product.store')}}" method="post" class="form-group">
        @csrf
        @method('post')
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token"
            value = "<?php echo csrf_token(); ?>">

        <label class="form-group">Announcement Details:</label>
        <input type="text" class="form-control mb-2" placeholder="Details" name="announcement-details">
        <label>Date Posted:</label>
        <input type="date" class="form-control mb-2" name="date-posted">
        <label>Until</label>
        <input type="date" class="form-control mb-2" name="date-until">
        <label class="form-group">Announcement Status:</label>
        <input type="text" class="form-control mb-2" value="ACTIVE" name="announcement-status">
        <button type="submit" value = "Add student" class="btn btn-primary">Submit</button>
    </form>
    
</body>
</html>