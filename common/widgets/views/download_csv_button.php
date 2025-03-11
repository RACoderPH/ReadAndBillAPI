<a id="<?= $id ?>" class="btn btn-action"><i class="fas fa-download"></i> Download</a>

<script>
    $(document).ready(function() {
        $("#<?= $id ?>").click(function() {
            alert("Are you sure you want to download this file?");
        });
        //update the download data url based on the windows current url (with the filters)
        var url = new URL(window.location.href);
        var query_string = url.search;
        var search_params = new URLSearchParams(query_string);
        search_params.set("<?= $action_name ?>", "<?= $action_value ?>");
        // change the search property of the main url
        url.search = search_params.toString();
        // the new url string
        var download_data_url = url.toString();
        $("#<?= $id ?>").attr("href", download_data_url);
        //add alert message "test"

    });
</script>