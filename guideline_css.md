# ガイドライン CSS

## 設計

案件内容・規模により設計手法を選択する。 
FLATではFLOCSSをベースにBEMとSMACSSをアレンジして取り入れる。
>理由：世間に認知された手法を使うことで説明・ドキュメント作成の手間を省く

**FLOCSS参考サイト**   
https://github.com/hiloki/flocss
  
**SMACSS参考サイト**  
SMACSSによるCSSの設計 | CodeGrid  
https://app.codegrid.net/entry/smacss-1
https://app.codegrid.net/entry/smacss-2


## 命名規則
BEMとFLOCSSをベースに独自のルールを設ける。

### BEM

親要素であるBlockに対して、子要素であるElementやパージョン違いを表すModifierを付与する。  
BlockとElement間は `__`（アンスコ2つ）で連結するが、BlockまたはElementとModifier間は、`--`（ハイフン2つ）で連結する。

```
.block // 親要素
.block__element // 子要素
.block--modifier // 親要素のバージョン違い
.block__element--modifier // 子要素のバージョン違い
```

### FLOCSS
FLOCSS設計での一番の悩みどころは、ComponentとProjectの判別であるが、本案件では下記のように判別する。  

Component＝サイト内で複数回使用するモジュール（モジュール単位でコンポーネント化する）  
Project＝Component以外のサイト固有のパーツ

###接頭詞

状態変化以外、接頭詞をつける。  
概念はPRECSSを参考にお願いします。一部アレンジしています。  
https://precss.io/ja/

| 内容  | 接頭詞 |説明|
| ------------- | ------------- |------------- |
| コンポーネント  | .c_xxx | ブロックモジュールにあたる|
| エレメント  | .e_xxx  | エレメントモジュールにあたる|
| プロジェクト| .p_xxx | ユニークにあたる|
| モディファイア|ベースのネーミング--xxx| モディファイアにあたる|
| ヘルパー|.h_xxx|ヘルパーにあたる|
| 状態変化|._xxx|プログラムにあたる|
| JavaScript用|#js_xxx|プログラムにあたる|
| WordPress block|.block_xxx|オリジナルにあたる|

### class名に連番を使用しない
連番を使用する最大のデメリットは、class名を見るだけでは、その機能や使用箇所を特定・想像できないことである。

```
// .card01と.card02それぞれの機能や使用箇所が特定・想像できない
.card01 {}
.card02 {}
```

class名には、汎用的なネーミングを用いる。（使用状況は限られるが、固有名詞もアリ）
参考サイト＝https://qiita.com/flatsato/items/f7efce78271980dde6c2

```
.card__title {} // 汎用的
.history__title {} // 歴史という項目で使用するパーツであることが明確である。
※固有名詞をclass名に使用する際は、他の項目では使用できないので注意。
.hisrory__titleは、歴史という項目以外では使用できない。
```

## SCSSの&について

BEMの&__Elementや&--Modifierといった記述は使用しない。

上記のデメリット一覧

- 検索性低下
- ネストが深くなりやすい（可読性低下）
- 一括リネーム不可

### NG例
```
.card {
  &__title {
    &--EN {}
  }
}
```

### OK例
```
.card {
  .card__title {}
  & > .card__title {} // 子セレクタ
  & + .button {} // 隣接セレクタ
  &:hover {} // 擬似クラス
  &::before {} // 疑似要素
  &[class=""] {} // 属性セレクタ 
  &._xxx {} // マルチクラス
}
```

## リセット

ress.cssを使用する
https://github.com/filipelinhares/ress
Normalize.cssをベースにしたリセットCSS

（参考サイト）
CSSリセットはこれで決まり！モダンブラウザによる相違を吸収するようカスタマイズされたスタイルシート -ress | コリス
http://coliss.com/articles/build-websites/operation/css/modern-css-reset-ress.html

## id/class

### レイアウト目的でidを使用しない。
>理由：ページ内で一度しか使えないidをレイアウト目的で使用しない。

id使用の例外
- ページ内リンク。
- JavaScriptのフックにidを利用する。その場合、js-接頭詞を付与する。

```
◎ OK
<ul id="js-carousel" class="p-carousel">
  <li class="p-carousel__item"></li>
</ul>

× NG
<ul id="carousel" class="p-carousel">
  <li class="p-carousel__item"></li>
</ul>
```

## ネーミング

### 追加・運用されるサイトの命名規則はBEMを使用する。

（参考サイト）
BEMによるフロントエンドの設計 | CodeGrid  
https://app.codegrid.net/entry/bem-basic-1
https://app.codegrid.net/entry/bem-1

###ハイフンとアンダースコアを使わない

BEM以外の単語のつなぎ目的でハイフンとアンダースコアを使わない。  
2単語以上使う場合はキャメルケースを使用する。

>理由：記号をネーミングに使わない

### エレメントは階層を作らない

__は1階層まで。エレメントはキャメルケースでつなげる。

>理由：階層を深くしない設計を徹底する。

```
◎OK
.block__elementHoge {} .block__elementFuga {} 

×NG
.block__elementHoge__elementFuga {}
```

### 状態とバリエーションを区別しない
>理由：状態ORバリエーションで悩む時間を減らす

```
◎OK
<div class="block _large _open _current">

×NG
<div class="block block--large is-open is-current">
```

（参考サイト）
http://5log.jp/blog/css_375/

## ショートハンド

### back-ground

ショートハンドを使用せず、個別に記述する。

> 理由：ショートハンドを明示的に指定する。レスポンシブ・アニメーションの指定がしやすいよう分割して記載する。

```
◎OK
  background-image: url(images/background-photo.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #464646;
  
×NG
background: #464646 url(background-photo.jpg) center center / cover no-repeat fixed;
```

CSS ショートハンド・プロパティの問題点 · terkel.jp  
http://terkel.jp/archives/2012/06/problem-with-css-shorthand-propaties/

```
◎OK
margin-top:10px;
  
×NG
margin:10px 0 0 0;

◎NG
margin: 0 auto;
```
## Media Queries

### 1ヶ所にまとめず、各プロパティに記述する。

gulpのcss-mqpackerを使い、記述をまとめる

```
◎OK
Sass
.hoge{
	共通の指定
	@include sp($point-sp){
		SPの指定
	}
	@include pc($point-pc){
		PCの指定
	}
}
```

### 同じ指定を2度書かない

```
◎OK
.hoge{
	font-size:14px;
		@include sp($point-sp){	}
		@include pc($point-pc){	}
}

×NG
.hoge{
	font-size:14px;
		@include sp($point-sp){
			font-size:14px;
		}
		@include pc($point-pc){
			font-size:14px;
		}
}
```

### ブレイクポイントは変数で管理する
>理由 一箇所で管理して、数値の揺れを防ぐため。

```
変数 _mixin.scss
https://github.com/harumi-sato/temp-gulp

//
//@include sps($point-sps) {}
//@include sp($point-sp) {}
//@include tbOnly($point-tbOnly) {}
//@include tb($point-tb) {}
//@include pc($point-pc) {}
//

$point-sps: 480px;
$point-sp: 767px;
$point-tb: 768px;
$point-pc: 992px;

@mixin sp($point-sps) {
@media screen and (max-width: $point-sps) { @content; }
}

@mixin sp($point-sp) {
@media screen and (max-width: $point-sp) { @content; }
}

@mixin tb($point-tb) {
@media screen and (min-width: $point-tb) { @content; }
}

@mixin tbOnly($point-tbOnly) {
@media screen and (min-width: $point-tb) and (max-width: 991) { @content; }
}

@mixin pc($point-pc) {
@media screen and (min-width: $point-pc) { @content; }
}
```

（参考サイト）
Media Queriesの効率的な書き方  
http://qiita.com/kyaido/items/828906ffa7198e99d0b7  
  
Foundation for Sites 6 Docs | Media Queries  
http://foundation.zurb.com/sites/docs/media-queries.html  
Media Queriesの値を参照

## ベンダープレフィックス
ベンダープレフィックスは個別に指定せずautoprefixerで指定する。  
手動で指定しないこと。

>理由：ブラウザの指定を検証を手動で行わず、自動で行う。

## その他

- 中学生程度の平易な英単語を使う。
- 英単語は辞書で検索 OR Google変換を使って正確なスペルを使用する。
- 命名の英単語は省略しない。btnなど
- CMS使用の場合、ネーミングは設計・URLに合わせる。
- class名は数字から始めない。
- 英単語の大文字は先頭のみとする。全部英字の場合はCSSで指定する。text-transform: uppercase;
- Sassファイルに接頭詞をつける。
- block単位でSassファイルを分割する。
- calc計算は他の作業者がわかるよう複雑にしないように心がける。
- mixinは関数はベース担当者のみ作成する。作成する場合は確認・事後報告する。
- HTMLにstyleで見た目を指定しない。JavaScriptなど例外の場合は除く。