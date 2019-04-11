for f in *.rrd
do
	rrdtool dump $f $f.xml
done
