<meta name="_token" content="{{ csrf_token() }}" />
<div class='row'>
    <form id="form1" action="post" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="name" name="name">
        <input type="button" id="sub" name="sub" value="submit">

    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/app.js"></script>