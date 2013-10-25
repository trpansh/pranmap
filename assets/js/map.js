$(document).ready(function() {

    var map = L.mapbox.map('map', false, {
        minZoom: 6,
        maxZoom: 10,
        inertia: true
    }).setView([28.7, 84.14], 6.5);

    var popup = new L.Popup({ autoPan: false, minWidth: 110 });
    var message = L.mapbox.legendControl({ position: 'topright' }).addLegend(getMessageHTML()).addTo(map);
    var legend = L.mapbox.legendControl({ position: 'topright' }).addLegend(getLegendHTML()).addTo(map);
    map.attributionControl.addAttribution("PRAN &copy; 2013");

	// L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
 //  		key: 'Insert Key Here',
 //  		styleId: 1930
	// }).addTo(map);

    function getStyle(feature) {
        for (var key in districtInfo) {
            var obj = districtInfo[key];
            if (feature.properties.DISTRICT.toLowerCase() ==  key.toLowerCase()) {
                return {
                    color: 'black',
                    opacity: 0.9,
                    fillColor: getColor(obj.CSO),
                    fillOpacity: 1,
                    weight: 2
                };
            }
        }
    }

    function getColor(d) {
        return d > 7  ? '#238443' :
               d > 5  ? '#41AB5D' :
               d > 3  ? '#78C679' :
               d > 2  ? '#ADDD8E' :
               d > 1  ? '#D9F0A3' :
               d > 0  ? '#F7FCB9' :
                        '#FFFFE5';
    }
    
    function onEachFeature(feature, layer) {
		layer.on({
			click: clickFeature,
			mousemove: popupFeature,
			mouseout: resetPopup
		})
	}

	function clickFeature(e) {
		var layer = e.target;
        nepalLayer.resetStyle(layer);
        layer.setStyle({
            fillColor: '#2BA6CB'
        });
        // map.fitBounds(layer.getBounds());
        var selection = layer.feature.properties.DISTRICT.toLowerCase();

         $.ajax({
            url: location.protocol + "//" + location.host + "/search/map_ajax",
            type: 'POST',
            dataType: 'html',
            data: {district: selection},
        })
        .done(function(data) {
            // $('select').prop('selectedIndex',0);
            // $('#search').val("");
            $('div#map-result').empty();
            $('div#map-result').html(data);
            $.scrollTo('div#map-result', 1000);
        });

        $.ajax({
            url: location.protocol + "//" + location.host + "/search/column_chart",
            type: 'POST',
            dataType: 'json',
            data: {district: selection},
        })
        .done(function(json) {
            alertify.set({ delay: 1000 });
            alertify.success("Results Found!");
            columnChart(json, selection);
        })
        .fail(function() {
            alertify.set({ delay: 1000 });
            alertify.error("No Results Found!");
            $('#column-chart').hide('slow');
        });

        $.ajax({
            url: location.protocol + "//" + location.host + "/search/pie_chart",
            type: 'POST',
            dataType: 'json',
            data: {district: selection},
        })
        .done(function(json) {
            pieChart(json, selection);
        })
        .fail(function() {
            $('#pie-chart').hide('slow');
        });
        
	}

    var closeTooltip;

	function popupFeature(e) {
		var layer = e.target;
        popup.setLatLng(e.latlng);
        for (var key in districtInfo) {
            var obj = districtInfo[key];
            if (layer.feature.properties.DISTRICT.toLowerCase() == key.toLowerCase()) {
                if (obj.MDTF && obj.SPBF) {
                    var string = "<tr><td class='tg-center tg-bf'>SPBF</td><td class='tg-center'>" + obj.SPBF + "</td></tr><tr class='tg-even'><td class='tg-center tg-bf'>MDTF</td><td class='tg-center'>" + obj.MDTF + "</td></tr>";
                } else if (obj.SPBF) {
                    var string = "<tr><td class='tg-center tg-bf'>SPBF</td><td class='tg-center'> " + obj.SPBF + "</td></tr>";
                } else if (obj.MDTF) {
                    var string = "<tr class='tg-even'><td class='tg-center tg-bf'>MDTF</td><td class='tg-center'>" + obj.MDTF + "</td></tr>";
                } else {
                    var string = "";
                }
                popup.setContent("<table class='tg-table'><tr><th class='tg-center' colspan=2 style='background-color:" + getColor(obj.CSO) + "'>"
                    + layer.feature.properties.DISTRICT[0] + layer.feature.properties.DISTRICT.substring(1).toLowerCase()
                    + "</th></tr><tr class='tg-even'><td class='tg-center tg-bf'>Total CSO's</td><td class='tg-center'>" 
                    + obj.CSO 
                    + "</td></tr>" 
                    + string);
            }
        }
        if (!popup._map) popup.openOn(map);
        window.clearTimeout(closeTooltip);
	       
        // highlight feature
        layer.setStyle({
            weight: 4
            // opacity: 1,
            // fillColor: '#01535E',
            // fillOpacity: 1
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
    
    }

	function resetPopup(e) {
        nepalLayer.resetStyle(e.target);
        closeTooltip = window.setTimeout(function() {
            map.closePopup();
        }, 100);
	}

    function getLegendHTML() {
        var grades = [0, 1, 2, 3, 5, 7];
        var labels = [];

        for (i=0; i<grades.length; i++) {
            var from = grades[i];
            var to = grades[i+1];

            labels.push(
                '<i style="background:' + getColor(from + 1) + '"></i> ' + 
                from + (to ? '&ndash;' + to : '+')
            );
        }

        return "<span><b><u>Total CSO's</u></b></span><br><br>" + labels.join('<br>');
    }

    function getMessageHTML() {
        return "<b style='font-size: 14px'>Click on a district.</b>";
    }

    var nepalLayer = L.geoJson(nepalDistrict, {
        style: getStyle,
        onEachFeature: onEachFeature
    }).addTo(map);

    var scaleControl = L.control.scale();

    // Larger screens get scale control and expanded layer control
    if (document.body.clientWidth <= 767) {
        var isCollapsed = true;
    } else {
        var isCollapsed = false;
        map.addControl(scaleControl);
    };

    function columnChart(json, selection) {
        $('#column-chart').slideDown('slow');
        $('#column-chart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: "<b>Total CSO's:</b> In <b>" + selection[0].toUpperCase() + selection.substring(1) + "</b> District"
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                useHTML: false
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                data: json,
                colorByPoint: true
            }]
        });
    }

    function pieChart(json, selection) {
        $('#pie-chart').slideDown('slow');
        $('#pie-chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: '<b>Identified Sectors:</b> In ' + '<b>' + selection[0].toUpperCase() + selection.substring(1) + '</b> District'
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: json
            }]
        });
    }

    $('#loading')
        .hide()
        .ajaxStart(function() {
            $(this).show();
        })
        .ajaxStop(function() {
            $(this).hide();
        })
    ;

    $('input[name="submit"]').attr('disabled','disabled');
    $('select').change(function() {
        if($(this).val() != '') {
           $('input[name="submit"]').removeAttr('disabled');
        }
    });

    $('#search').keyup(function()  {
        if($(this).val() == '') {
            $('#search-submit').attr('disabled', true);
        } else {
            $('#search-submit').removeAttr('disabled');
        }
    });

});	