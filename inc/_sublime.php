<!-- #sublime Sublime 安裝與使用說明 (start) -->
<div id="sublime">
    <div class="mod-content">
        <div class="hd">
            <h1>Sublime Text 2</h1>
            <p>最近在 Open Source 最熱門的編輯器之一，免費（有時會跳出提醒購買的訊息）且支援各種知名的套件。</p>
        </div>
        <div class="bd">
            <h2>好處</h2>
            <ul>
                <li>雖然功能強大、但是速度飛快。</li>
                <li>直接關掉沒存檔也沒關係、他會保留你的工作狀態。</li>
                <li>套件安裝非常方便、而且都是最流行的套件。</li>
                <li>很容易客製化：所有的設定都透過 JSON 格式，你可以輕易修改為你慣用的設定。</li>
            </ul>
            <h2>安裝方式</h2>
            <ol>
                <li>
                    <a href="http://www.sublimetext.com/2" target="_blank">下載頁面</a>
                    <p>支援各種作業系統！請下載安裝。</p>
                </li>
                <li>
                    <em>安裝 Package Control 套件</em>
                    <p>不需要下載，可透過 Console 安裝，請按 <code>Ctrl + `</code> 叫出 Sublime Console。Copy/Paste 下面的指令</p>
                    <pre><code>import urllib2,os; 
pf='Package Control.sublime-package'; 
ipp=sublime.installed_packages_path(); 
os.makedirs(ipp) if not os.path.exists(ipp) else None; 
urllib2.install_opener(urllib2.build_opener(urllib2.ProxyHandler())); 
open(os.path.join(ipp,pf),'wb').write(urllib2.urlopen('http://sublime.wbond.net/'+pf.replace(' ','%20')).read());
print 'Please restart Sublime Text to finish installation'
                    </code></pre>
                </li>
                <li>
                    <em>設定 Project</em>
                    <p>
                        請至 Project > Add Folder to Project 將 C:\AppServ\www 加入、並儲存。
                        未來 Compass 可以以此為依據做 Build。
                    </p>
                </li>
                <li>
                    <em>套件安裝方式</em>
                    <p>
                        因為已經裝了 Package Control，未來套件就可以直接在介面上操作、連 Console 都不用呼叫！
                        請按 <code>Ctrl + Shift + P</code>、輸入 "Install" 按 Enter 就會列出你可以安裝的 Sublime 套件、當然也可以直接搜尋！
                        請注意：<em>會花點時間等待，請有些耐心，編輯器左下角會顯示目前的狀態</em> :)
                    </p>
                </li>
            </ol>
            <h2>常用的快速鍵</h2>
            <ul>
                <li>Ctrl + K, Ctrl + [1 - 9] : 將現有的程式碼做摺疊。</li>
                <li>Ctrl + P : 快速找到自己所需要的檔案。</li>
                <li>Ctrl + Shift + P : 套件管理相關。</li>
                <li>Ctrl + Space : 自動完成，這跟我們輸入法切換有衝突，需要叫出 Preferences > Key Bindings - User 做調整（我改為 Ctrl + G)：
                    <pre><code>[
    { "keys": ["ctrl+g"], "command": "auto_complete" }
]</code></pre>
                </li>
            </ul>
            <h2>推薦安裝的套件</h2>
            <p>
                如前面所提， 請按 <code>Ctrl + Shift + P</code>、輸入 "Install" 按 Enter 就可以搜尋 Sublime 套件！
            </p>
            <ul>
                <li>
                    <em>HTMLAttribute</em>
                    <p>
                        名字很清楚啦，就是針對 HTML 屬性的自動完成做補全。
                    </p>
                </li>
                <li>
                    <em>LiveReload - LiveReload 真棒</em>
                    <p>
                        當有檔案修改時、瀏覽器可以自動更新。 瀏覽器也需要安裝對應的外掛，例如 <a href="https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei" target="_blank">Chrome</a>。
                        不過我在使用時不太聽話就是了 :p
                    </p>
                </li>
                <li>
                    <em>Compass</em>
                    <p>CSS 建置工具，裝好以後按 Ctrl + B 即可啟動。</p>
                </li>
                <li>
                    <em>ZenCoding</em>
                    <p>快速產生 CSS 與 HTML 的語法工具，輸入 <code>html>#photo-list>h2+ul>list.photo-item*10</code> 後面按個 Tab 試試看？</p>
                </li>
                <li>
                    <em>SublimeCodeIntel</em>
                    <p>Code Intelligence，將自動完成的語法更加強化！</p>
                </li>
            </ul>

        </div>
    </div>
</div>
<!-- #sublime Sublime 安裝與使用說明 (end) -->

