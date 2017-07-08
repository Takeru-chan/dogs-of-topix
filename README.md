# Apply the dogs of the dow to TOPIX.

ダウの犬戦略をTOPIXに適用してみました。
phpで書いています。  

[TOPIX版ダウの犬自動計算シート（株価更新版）](https://www.junk-works.science/automatic-caluclation-dogs-of-the-dow-by-php-2/#sheet)

## Usage｜使い方

入力フォームに金額を入れると、TOPIX Core30の配当利回り上位10銘柄について１株単位で均等分散投資できるように計算します。  

## Warning｜警告

計算結果の正しさについては一切保証いたしません。
使用する株価は、毎朝stock.shを実行すると前日の終値に更新されます。

買付手数料は単元未満株売買ができるマネックス証券のパソコンでの成行注文手数料で計算しています。（2017年7月2日現在）  

## License

This script has released under the MIT license.  
[http://opensource.org/licenses/MIT](http://opensource.org/licenses/MIT)
