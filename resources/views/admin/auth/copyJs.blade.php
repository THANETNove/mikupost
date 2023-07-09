<script>
const copyBtns = document.querySelectorAll('.copy-btn');
copyBtns.forEach(copyBtn => {
    copyBtn.addEventListener('click', () => {
        const textToCopy = copyBtn.dataset.text;
        const tempInput = document.createElement('input');
        tempInput.value = textToCopy;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        /*   alert('คัดลอกข้อความสำเร็จ'); */
        var paragraph = document.getElementById("copy-message");
        var text = document.createTextNode("คัดลอกข้อความสำเร็จ");
        paragraph.appendChild(text);

        // ซ่อน Alert หลังจาก 3 วินาที (3000 มิลลิวินาที)
        setTimeout(() => {
            var textNode = paragraph.firstChild;
            paragraph.removeChild(textNode);
        }, 1000);
    });
});
</script>