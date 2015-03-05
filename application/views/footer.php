</div>
<script>
    function duplicateRow(elm) {
        var what = $(elm).data('repeat');
        if ($(what).parent('td').find('input').length > 4) {
            $(elm).hide();
            return;
        }
        var html = $(what).eq(0).html();
        $(what).after('<p class="">' + html + '</p>');
    }
    
</script>
</body>
</html>