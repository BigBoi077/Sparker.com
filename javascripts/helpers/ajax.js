export function getNbrPolls() {
    $.ajax({url: "/Sparker.com/app/helpers/ajax.php", success: function(result) {
        console.log(result)
    }})
}