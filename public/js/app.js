class ViewFileName {
    constructor() {
        const fileName = document.getElementById('select_file_name');
        document.getElementById('input_file').addEventListener('change', e => {
            fileName.innerText = e.target.files[0]["name"];
        });
    }
}

new ViewFileName();
