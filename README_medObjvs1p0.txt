Trying to set up medObjvs1p0 and using sagearbor.com since I own domain.


Steps I had to take to make the csv exported from google docs, importable in the mysql table.

1) In googleDocs : File --> Download --> As csv current sheet
2) In excel      : Replace all double quotes with single quotes.  Ctrl-H --> replace " , with '
3) In excel      : Delete unwanted columns to right.  As writing my last column I kept  was discipline3 in column AG.
4) In excel      : Insert column to left for primary key, put "PK_o" in top cell, leave column empty.
5) In notepad++  : Insert double quote at begginning and end of each comma separated value.
                   From this url=  http://stackoverflow.com/questions/3560083/need-to-apply-double-quotes-around-every-value-of-csv-file
                   Use regex replace option in notepad++
                        search for       -->     ([^,]*)(,|$)
                        replace all with -->     "$1"$2

