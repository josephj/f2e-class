/*global YUI */
YUI().use("handlebars", "uploader", function (Y) {

    // 若沒有安裝 Flash、也不支援 HTML5 上傳, 或者是 iOS 系統：一律不使用這個 Uploader
    if (Y.Uploader.TYPE === "none" || Y.UA.ios) {
        Y.one("#upload-form").set("text", "此瀏覽器無法使用 Uploade！");
        return;
    }
    Y.log("瀏覽器所支援的 Uploader 類型為：" + Y.Uploader.TYPE);

    var _progressNode = Y.one("#overall-progress"),
        _uploader,
        _isFinish  = false,
        _template,
        _html,
        //==============
        // 常數
        //==============
        SWF_URL    = "http://yui.yahooapis.com/3.7.3/build/uploader/assets/flashuploader.swf",
        UPLOAD_URL = "uploader.php",
        //===============
        // 事件處理函式
        //===============
        _handleFileSelect,
        _handleUploadStart,
        _handleUploadButtonClick,
        _handleUploadProgress,
        _handleTotalUploadProgress,
        _handleUploadComplete,
        _handleAllUploadsComplete;

    // 輸出 HTML
    _template = Y.one("#template-uploader").getHTML();
    _template = Y.Handlebars.compile(_template)();
    Y.one("#upload-form .bd").append(_template);

    _template = Y.one("#template-item").getHTML();
    _template = Y.Handlebars.compile(_template);

    // 步驟 1 - 使用者選取好檔案之後、要將檔案資訊放入列表中
    _handleFileSelect = function (e) {
        Y.log("_handleFileSelect() is executed.");
        var files     = e.fileList,
            fileTable = Y.one(".file-data tbody");

        if (files.length === 0 || !Y.one(".empty")) {
            return;
        }
        Y.one(".empty").remove();
        if (_isFinish) {
            _isFinish = false;
            fileTable.setHTML("");
        }
        Y.each(files, function (file) {
            fileTable.append(_template({
                id   : file.get("id"),
                name : file.get("name"),
                size : file.get("size")
            }));
        });
        if (!_isFinish && _uploader.get("fileList").length > 0) {
            _uploader.set("enabled", false);
            Y.later(1000, null, function () {
                _uploader.uploadAll();
            });
        }
    };

    // 步驟 2 - 開始上傳：控制按鈕外觀及移除事件
    _handleUploadStart = function (e) {
    };

    // 步驟 3 - 上傳中 (單一檔案) : 更新列表中的上傳進度
    _handleUploadProgress = function (e) {
        Y.log("_handleUploadProgress() is executed.");
        var row = Y.one("#" + e.file.get("id") + "_row");
        row.one(".percent").set("text", e.percentLoaded + "%");
    };

    // 步驟 4 - 上傳中 (整體進度) : 更新整體上傳進度
    _handleTotalUploadProgress = function (e) {
        Y.log("_handleTotalUploadProgress() is executed.");
        _uploader.set("selectButtonLabel", "上傳中 (" + e.percentLoaded + "%)");
    };

    // 步驟 5 - 單一檔案上傳完成 : 在列表上顯示上傳完畢
    _handleUploadComplete = function (e) {
        Y.log("_handleUploadComplete() is executed.");
        var fileRow = Y.one("#" + e.file.get("id") + "_row");
        fileRow.one(".percent").set("text", "上傳完畢");
    };

    // 步驟 6 - 所有檔案皆上傳完成 : 顯示訊息、處理按鈕與 Uploader 讓檔案可以再度上傳
    _handleAllUploadsComplete = function (event) {
        Y.log("_handleAllUploadsComplete() is executed.");
        _uploader.set("enabled", true);
        _uploader.set("fileList", []);
        _uploader.set("selectButtonLabel", "上傳完畢");
        _isFinish = true;
    };

    // 建立 Uploader
    _uploader = new Y.Uploader({
        width             : "200px",    // 按鈕的寬
        height            : "35px",     // 按鈕的高
        multipleFiles     : true,       // 是否要上傳多個檔案
        selectButtonLabel : "上傳檔案", // 顯示在按鈕上的文字
        swfURL            : SWF_URL,    // Flash 檔案所在位置（若支援 HTML5 就不會用到)
        uploadURL         : UPLOAD_URL, // 上傳的位置
        simLimit          : 2,          // 同時上傳數量
        fileFieldName     : "file",
        withCredentials   : false
    });
    // 將按鈕放入指定的 div 中
    _uploader.render(".uploader");

    // 步驟 1 - 使用者選取好檔案之後、要將檔案資訊放入列表中
    _uploader.after("fileselect", _handleFileSelect);
    // 步驟 2 - 開始上傳：控制按鈕外觀及移除事件
    _uploader.on("uploadstart", _handleUploadStart);
    // 步驟 3 - 上傳中 (單一檔案) : 更新列表中的上傳進度
    _uploader.on("uploadprogress", _handleUploadProgress);
    // 步驟 4 - 上傳中 (整體進度) : 更新整體上傳進度
    _uploader.on("totaluploadprogress", _handleTotalUploadProgress);
    // 步驟 5 - 單一檔案上傳完成 : 在列表上顯示上傳完畢
    _uploader.on("uploadcomplete", _handleUploadComplete);
    // 步驟 6 - 所有檔案皆上傳完成 : 顯示訊息、處理按鈕與 Uploader 讓檔案可以再度上傳
    _uploader.on("alluploadscomplete", _handleAllUploadsComplete);
});
