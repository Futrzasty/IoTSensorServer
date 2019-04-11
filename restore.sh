for f in *.xml
do
        rrdtool restore $f $f.rrd
done
rename -v 's/\.rrd.xml.rrd$/\.rrd/' *.rrd.xml.rrd
chown www-data s*.rrd
