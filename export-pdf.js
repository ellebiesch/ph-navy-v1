jQuery(function ($){
	$("#exportButton").click(function() {
		var dataSource = shield.DataSource.create({
			data: "#myTable",
			schema: {
				type: "table",
				fields: {
					QUANTITY: {type: Number},
					U/I: {type: String},
					DESCRIPTION: {type: String},
					MODEL: {type: String},
					SERIAL-NO.: {type: Number},
					REMARKS: {type: String}
				}
			}
		});

		dataSource.read().then(function(data) {
			var pdf = new shield.exp.PDFDocument({
				author: "NICTS",
				created: new Date()
			});

			pdf.addPage("a4", "portrait");
			pdf.table(50, 50, data,
				[
					{ field: "QUANTITY", title: "QUANTITY", width: 50},
					{ field: "U/I", title: "U/I", width: 90},
					{ field: "DESCRIPTION", title: "DESCRIPTION", width: 150},
					{ field: "MODEL", title: "MODEL", width: 150},
					{ field: "SERIAL NO.", title: "SERIAL-NO.", width: 100},
					{ field: "REMARKS", title: "REMARKS", width: 150},
				],
				{
					margins: {
						top: 50,
						left: 50
					}
				}
				);

			pdf.saveAs({
				fileName: "NICTS"
			});
		});
	});
});