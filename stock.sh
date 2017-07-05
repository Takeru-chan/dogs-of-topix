#! /usr/local/bin/bash
PATH=/bin:/usr/bin:/sbin:/usr/sbin:/usr/local/bin
TARGET='./stock.list'
LOG='./price.list'
for CODE in `head -1 $TARGET | tr ',' ' '`
do
  RESULT=`curl -s "https://www.google.com/finance/getprices?p=1Y&i=86400&x=TYO&q=${CODE}" |\
    grep -e '^a[0-9,.]*$' | cut -d ',' -f 1,2`
  PRICE=${PRICE}","`echo $RESULT | cut -d ',' -f 2`
done
DATE=$((`echo $RESULT | cut -d ',' -f 1 | tr -d 'a'` - 86400))
date -jf "%s" $DATE "+%Y年%m月%d日" > $LOG
echo $PRICE | sed 's/^,//' >> $LOG
