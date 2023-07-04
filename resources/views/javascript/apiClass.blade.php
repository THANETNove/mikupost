<script>
var changeGitBody = document.getElementById("change-git-body");
changeGitBody.addEventListener("mousedown", function() {
    changeGitBody.classList.add("active2");
    changeGitBodyTow.classList.remove("active2");
});

var changeGitBodyTow = document.getElementById("change-git-body-tow");
changeGitBodyTow.addEventListener("mousedown", function() {
    changeGitBodyTow.classList.add("active2");
    changeGitBody.classList.remove("active2");
});

function changeRetVal(newValue) {
    $.ajax({
        url: `{{ url('/update-retral/${newValue}') }}`,
        type: 'GET',
        success: function(res) {
            console.log("res[0]", res[0]);
            console.log("res[1]", res[1]);
            if (res[0] == "service-body-cover") {

                var elements = document.querySelectorAll(".keyClass-service");
                for (var i = 0; i < elements.length; i++) {
                    elements[i].classList.add("row", res[0]);
                    elements[i].classList.remove("row", "service-body-cover-list");
                }

                var elementsCover = document.querySelectorAll(".keyClass-cover");
                for (var k = 0; k < elementsCover.length; k++) {
                    elementsCover[k].classList.add(res[1]);
                    elementsCover[k].classList.remove("cover-page-list");
                }

            } else {

                var elements = document.querySelectorAll(".keyClass-service");
                for (var i = 0; i < elements.length; i++) {
                    elements[i].classList.add("row", res[0]);
                    elements[i].classList.remove("service-body-cover");
                }

                var elementsCover = document.querySelectorAll(".keyClass-cover");
                for (var k = 0; k < elementsCover.length; k++) {
                    elementsCover[k].classList.add(res[1]);
                    elementsCover[k].classList.remove("cover-page");
                }

            }
        }
    });
}
</script>