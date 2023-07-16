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

function randomData(randomId) {
    var elements = document.querySelectorAll('.categories_name');
    var idsAndClasses = [];

    elements.forEach(function(element) {
        var id = element.id;
        var classes = element.classList.toString();

        idsAndClasses.push({
            id: id,
            classes: classes
        });
    });

    this.getRandomData(idsAndClasses, randomId);
}

function getRandomData(idsAndClasses, randomId) {

    idsAndClasses.forEach(function(item) {
        var idString = item.id;
        var parts = idString.split('-');
        var numberId = parts[1];

        var imagePath = "https://img.neko-post.net/imageManga/mangaCover/";

        $.ajax({
            url: '{{ url("get-manga-random") }}/' + numberId,
            type: 'GET',
            success: function(resRe) {


                // ดำเนินการกับข้อมูลที่ได้รับ
                resRe.data.forEach(function(item, index) {


                    let text = item.manga_name;
                    let maxLength = 16; // จำนวนอักขระสูงสุดที่ต้องการแสดง
                    let truncatedText = text.length > maxLength ? text.substring(0,
                        maxLength) + "..." : text;

                    if (randomId) {
                        if (index == 0) {
                            var container = document.getElementById("profile-item-" +
                                randomId);
                            container.innerHTML = '';
                        }


                        var container = document.getElementById("profile-item-" +
                            randomId);
                        var row = document.createElement("div");
                        row.className = "row";
                        container.appendChild(row);

                        var link = document.createElement("a");
                        link.href = "{{ url('manga-cover-show/120') }}";
                        row.appendChild(link);

                        var div = document.createElement("div");
                        div.className = " horizontal d-flex";
                        link.appendChild(div);

                        var coverImageCol = document.createElement("div");
                        coverImageCol.className = "col";
                        div.appendChild(coverImageCol);

                        var coverImage = document.createElement("div");
                        coverImage.className = "cover-image";
                        coverImageCol.appendChild(coverImage);

                        var image = document.createElement("img");
                        image.src = imagePath + item.cover_photo;
                        image.className = "page-cover";
                        image.alt = "";
                        coverImage.appendChild(image);

                        var serviceContentsCol = document.createElement("div");
                        serviceContentsCol.className = "col-8";
                        div.appendChild(serviceContentsCol);

                        var serviceContents = document.createElement("div");
                        serviceContents.className = "service-contents";
                        serviceContentsCol.appendChild(serviceContents);

                        var mangaName = document.createElement("p");
                        mangaName.className = "name-comment";
                        mangaName.textContent = truncatedText;
                        serviceContents.appendChild(mangaName);

                        var mangaDe = document.createElement("p");
                        mangaDe.className = "comment";
                        mangaDe.textContent =
                            "Far far away, behind the word mountains, far from the";
                        serviceContents.appendChild(mangaDe);

                    } else {

                        var container = document.getElementById("profile-item-" +
                            numberId);
                        var row = document.createElement("div");
                        row.className = "row";
                        container.appendChild(row);

                        var link = document.createElement("a");
                        link.href = "{{ url('manga-cover-show/120') }}";
                        row.appendChild(link);

                        var div = document.createElement("div");
                        div.className = " horizontal d-flex";
                        link.appendChild(div);

                        var coverImageCol = document.createElement("div");
                        coverImageCol.className = "col";
                        div.appendChild(coverImageCol);

                        var coverImage = document.createElement("div");
                        coverImage.className = "cover-image";
                        coverImageCol.appendChild(coverImage);

                        var image = document.createElement("img");
                        image.src = imagePath + item.cover_photo;
                        image.className = "page-cover";
                        image.alt = "";
                        coverImage.appendChild(image);

                        var serviceContentsCol = document.createElement("div");
                        serviceContentsCol.className = "col-8";
                        div.appendChild(serviceContentsCol);

                        var serviceContents = document.createElement("div");
                        serviceContents.className = "service-contents";
                        serviceContentsCol.appendChild(serviceContents);

                        var mangaName = document.createElement("p");
                        mangaName.className = "name-comment";
                        mangaName.textContent = truncatedText;
                        serviceContents.appendChild(mangaName);

                        var mangaDe = document.createElement("p");
                        mangaDe.className = "comment";
                        mangaDe.textContent =
                            "Far far away, behind the word mountains, far from the";
                        serviceContents.appendChild(mangaDe);
                    }






                });

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

    });
}



window.onload = function() {
    var elements = document.querySelectorAll('.categories_name');
    var idsAndClasses = [];

    elements.forEach(function(element) {
        var id = element.id;
        var classes = element.classList.toString();
        idsAndClasses.push({
            id: id,
            classes: classes
        });
    });

    idsAndClasses.forEach(function(item) {
        var idString = item.id;
        var parts = idString.split('-');
        var numberId = parts[1];

        var imagePath = "https://img.neko-post.net/imageManga/mangaCover/";

        // ส่วนของ เนื่องหา
        $.ajax({
            url: '{{ url("get-manga-all") }}/' + numberId,
            type: 'GET',
            success: function(res) {
                // ดำเนินการกับข้อมูลที่ได้รับ
                res.forEach(function(item) {
                    let text = item.manga_name;
                    let maxLength = 16; // จำนวนอักขระสูงสุดที่ต้องการแสดง
                    let truncatedText = text.length > maxLength ? text.substring(0,
                        maxLength) + "..." : text;
                    var container = document.getElementById("categories-" + numberId +
                        "-image");
                    var currentDateTime = new Date(); // วันที่และเวลาปัจจุบัน

                    var targetDateTime = new Date(
                        item.updated_at); // วันที่และเวลาเป้าหมาย

                    var timeDifference = targetDateTime -
                        currentDateTime; // คำนวณความแตกต่างของเวลา
                    var daysPassed = Math.floor(Math.abs(timeDifference) / (1000 *
                        60 * 60 * 24)); // จำนวนวันที่ผ่านไป
                    var hoursPassed = Math.floor(Math.abs(timeDifference) / (1000 *
                        60 * 60)) % 24; // จำนวนชั่วโมงที่ผ่านไป

                    var link = document.createElement("a");
                    link.href = "{{ url('manga-cover-show') }}/" + item.id;
                    container.appendChild(link);

                    var div = document.createElement("div");
                    div.className = "keyClass-service service-body-cover";
                    link.appendChild(div);

                    var coverImage = document.createElement("div");
                    coverImage.className = "cover-image-page";
                    div.appendChild(coverImage);

                    var image = document.createElement("img");
                    image.src = imagePath + item.cover_photo;
                    image.className = "keyClass-cover cover-page";
                    image.alt = "";
                    coverImage.appendChild(image);

                    var serviceContents = document.createElement("div");
                    serviceContents.className = "service-contents";
                    div.appendChild(serviceContents);

                    var mangaTitle = document.createElement("p");
                    mangaTitle.className = "manga-title";
                    mangaTitle.textContent = truncatedText;
                    serviceContents.appendChild(mangaTitle);

                    var mangaChapter = document.createElement("p");
                    mangaChapter.className = "manga-ch";
                    mangaChapter.textContent = "Ch." + item.maxEpisodeId +
                        "-  ตอนที่-" + item.maxEpisodeId;
                    serviceContents.appendChild(mangaChapter);

                    var translatorsName1 = document.createElement("p");
                    translatorsName1.className = "translators-name";
                    translatorsName1.textContent = "ผู้แปลที่-" + (item.author ? item
                        .author : "");
                    serviceContents.appendChild(translatorsName1);

                    var translatorsName2 = document.createElement("p");
                    translatorsName2.className = "translators-name";
                    translatorsName2.textContent = (daysPassed > 0) ? ("Update- " +
                        daysPassed +
                        " วัน   " + hoursPassed + " ชั่วโมง") : ("Update- " +
                        hoursPassed +
                        " ชั่วโมง");
                    serviceContents.appendChild(translatorsName2);
                });


            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

    });

    this.getRandomData(idsAndClasses, null);
};
</script>