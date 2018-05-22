var db = new PouchDB('mydb28');
	var remoteDB = new PouchDB('https://adh.rapidnet.de:6984/fcm-test'); 
	this.db.sync(remoteDB, {
		live: true,
		retry: true
	    }).on('change', function (change) {
		console.log('data change', change)
	    }).on('error', function (err) {
		console.log('sync error', err)
	});
	
	