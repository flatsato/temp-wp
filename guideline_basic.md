# コーディング 基本方針

## ガイドラインの目的

クオリティ向上＝最新制作法の共有化。最適な方法を選択し全体のクオリティを向上する。  
コードの均一化＝コーディングルールを見える化し、制作者・技術レベル・案件ごとの揺れを防ぐ。  
制作効率＝ルールを明確にして悩む時間を減らす。修正の工数・手戻りを最小限にする。  

## 柔軟なコーディング

技術至上主義でなく、クライアントの環境・体制を考慮し、最適なコーディングを提供する。  
複数人・複数会社での制作・運用を考慮し、スケジュールや運用体制によって内容を検討する。  
案件ガイドライン、リーダーから指定があった場合はそのルールを優先する。

## 提案型コーディング

制作コストを削減し顧客の目的にあったサイトを作るため、デザイン至上主義にならない設計を提案する。  
操作したくなるサイトを目指しシンプルなレイアウトにUIアニメーションをつける。

## 実装思想

FLATのコーディングはGraceful Degradationを基本とする。

```
Graceful Degradation（グレイスフル デグラデーション）
リッチな表現・シンプルなコードで制作する。 
モダンブラウザ（IE11）を基準に設計し、他のブラウザは表現を制限する。 
```

```
Progressive Enhancement（プログレッシブ・エンハンスメント）
古いブラウザで閲覧可能。表現を抑えて快適に制作する。 
IE10、Android4.2〜を基準に設計し、新しい技術や重い処理を使わない。 
多くのユーザーが使うサイトで古いブラウザをサポートする場合、
古いブラウザでも快適に見れるサイトを作成する。
```

```
Regressive Enhancement（レグレッシブ・エンハンスメント）
対応度の低いブラウザは、Polyfill（ポリフィル）などの技術を使って、
対応度の高いブラウザと同等の機能を提供します。
```

（参考） 3つの実装の考え方 | CodeGrid  
https://app.codegrid.net/entry/ways-of-implementation

## フォルダ構成

各フォルダの説明は以下の通りです。

```
├── README.md 【制作者は必ず読む】
├── /dist/ （生成フォルダ）
├── guideline_basic.md 【制作者マニュアル 基本】
├── guideline_css.md【制作者マニュアル CSS】
├── guideline_flow.md【制作者マニュアル はじめてのかたへ】
├── guideline_html.md【制作者マニュアル HTML】
├── gulp.config.js （gulpをコントロールしやすくしたファイル）
├── gulpfile.js （制作環境担当者）
├── package-lock.json
├── package.json
└── /src/ （制作フォルダ）
    ├── /duplicate/ （そのまま複製されるフォルダ）
    │   ├── css
    │   │   └── vendor
    │   │       └── ress.min.css
    │   └── js
    │       └── vendor
    │           ├── jquery-3.4.1.min.js
    │           └── ofi.min.js
    ├── /img/ （そのまま複製されるフォルダ）
    │   ├── /common/ （サイト共通画像）
    │   │   ├── icon_facebook.svg
    │   │   ├── icon_line.svg
    │   │   └── icon_twitter.svg
    │   ├── /dummy/ （ダミー画像 公開・納品前にフォルダごと削除。このフォルダ以外にダミー・アテの画像を入れない）
    │   └── /head/ （head内で使う画像）
    │       ├── apple-touch-icon.png
    │       ├── favicon-16x16.png
    │       ├── favicon-32x32.png
    │       ├── favicon.ico
    │       ├── ogp.png
    │       ├── safari-pinned-tab.svg
    │       └── site.webmanifest
    ├── /js/（JavaScriptフォルダ）
    │   ├── hashScroll.js
    │   ├── script.js
    │   └── scrollTarget.js
    ├── /scss/（Sassフォルダ）
    │   ├── _animation.scss アニメーション共通指定
    │   ├── _breakpoint.scss ブレークポイント指定
    │   ├── _font.scss フォント共通指定
    │   ├── _function.scss 変数の共通指定
    │   ├── _mixin.scss サイト共通mixin用
    │   ├── _reset.scss オリジナルリセットCSS
    │   ├── _zindex.scss zindex指定用
    │   ├── /object/ （Sassフォルダ＞コンポーネントなど）
    │   │   ├── _c-br.scss
    │   │   ├── _c-hamburger.scss
    │   │   ├── _c-heading.scss
    │   │   ├── _l-breadcrumb.scss
    │   │   ├── _l-container.scss
    │   │   ├── _l-contents.scss
    │   │   ├── _l-footer.scss
    │   │   ├── _l-gnav.scss
    │   │   ├── _l-header.scss
    │   │   ├── _l-main.scss
    │   │   ├── _l-pagetop.scss
    │   │   ├── _u-hide.scss
    │   │   ├── _u-margin.scss
    │   │   ├── _u-padding.scss
    │   │   └── _u-uppercase.scss
    │   └── style.scss（こちらは直接編集しない）
    ├── /template/ （ejsフォルダ）
        ├── /_include/ （ejsフォルダ＞インクルード）
        │   ├── _c-sns.ejs
        │   ├── _l-breadcrumb.ejs
        │   ├── _l-footer.ejs
        │   ├── _l-gnav.ejs
        │   ├── _l-header.ejs
        │   ├── _l-sub.ejs
        │   ├── _p-kv.ejs
        │   ├── _p-localNav.ejs
        │   ├── _wp-pagination.ejs
        │   └── /common/ （ejsフォルダ＞インクルード、サイト共通）
        │       ├── _foot.ejs
        │       └── _head.ejs
        ├── index.ejs（制作一覧ページ）
        ├── page_base_column1.ejs（サンプルファイル＞納品、公開時には削除する）
        ├── page_base_column2.ejs（サンプルファイル＞納品、公開時には削除する）
        ├── page_form.ejs（サンプルファイル＞納品、公開時には削除する）
        ├── page_single.ejs（サンプルファイル＞納品、公開時には削除する）
        └── page_top.ejs（サンプルファイル＞納品、公開時には削除する）
```



