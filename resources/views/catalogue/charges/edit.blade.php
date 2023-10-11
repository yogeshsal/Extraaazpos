@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<!-- Include Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

<!-- Include jQuery (required for Bootstrap Switch) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap Switch JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<style>
    .form-row {
        margin-bottom: 20px;
        /* Add space below each row */
    }
</style>

<style>
    * {
        margin: 0 auto;
        box-sizing: border-box;
        font-family: Roboto, sans-serif;
    }

    /* body{
  background:#222;
} */

    #content1 {
        max-width: 100vw;
    }

    /* .tabContainer {
  background: #333;
  border: .45px solid #555;
  margin: 0 auto;
} */
    .tabContent {
        padding: 10px;
        text-align: left;
        min-height: 200px;
        color: #000000;
    }

    /* Hide all but first tab */
    .tabContent>div:not(:first-child) {
        display: none;
    }

    .tabContainer>.tabs {
        overflow: hidden;
        width: 100%;
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
    }

    .tabs li {
        float: left;
        display: flex;
        flex: 1;
    }

    .tabs a {
        position: relative;
        background: #fff;
        border-top: 3px solid rgba(0, 0, 0, 0);
        padding: 1em .5em;
        float: left;
        text-decoration: none;
        color: #000000;
        margin: 0 .1em 0 0;
        font-size: 1em;
        flex: 1;
        transition: all .35s ease;
    }

    .tabs a.active {
        border-top: 3px solid #f39d77;
        color: #000000;
        background: inherit;
    }

    .tabs a:hover {
        background: #fff;
        color: orange;
    }
</style>

<br>





<script>
    $(document).ready(function() {
        $('#item_is_recommended').bootstrapSwitch();
        $('#item_is_package_good').bootstrapSwitch();
        $('#item_sell_by_weight').bootstrapSwitch();
    });
</script>

<script>
    $("#content").on("click", ".tabContainer .tabs a", function(e) {
        e.preventDefault(),
            $(this)
            .parents(".tabContainer")
            .find(".tabContent > div")
            .each(function() {
                $(this).hide();
            });

        $(this)
            .parents(".tabs")
            .find("a")
            .removeClass("active"),
            $(this).toggleClass("active"), $("#" + $(this).attr("src")).show();
    });
</script>
@endsection