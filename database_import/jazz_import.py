import MySQLdb
import xml.etree.ElementTree
import time

# Connect to database
db = MySQLdb.connect(host="localhost", user="bloke", passwd="password", db="jazz")
cur = db.cursor()

# Open a file
root = xml.etree.ElementTree.parse('clean2.xml').getroot()

# Get the data from XML
try:

	# Prepare list of instruments
	instruments = [];
	instrument_ids = [];
	query = ""

	for musician in root.findall('musician'):

		# First name
		fname = musician.find('fname').text

		# Middle name
		mname = None
		if musician.find('mname') is not None:
			mname = musician.find('mname').text

		# Last name
		lname = None
		if musician.find('lname') is not None:
			lname = musician.find('lname').text

		# DOB
		str_dob = musician.find('dob').text
		if str_dob[:1] is '1':
			str_dob = "3" + str_dob[1:]
		dob = time.strptime(str_dob, '%Y-%m-%d')

		# DOD
		dod = None
		if musician.find('dod') is not None:
			dod = musician.find('dod').text

		# Prepare database strings
		if mname is None:
			mname = 'null'
		db_dob = time.strftime('%Y-%m-%d', dob)
		if str_dob[:1] is '3':
			str_dob = "1" + str_dob[1:]

		# Prepare database query
		query = "INSERT INTO musicians (fname, mname, lname, dob, dod) VALUES (%s, %s, %s, %s, %s)"
		cur.execute(query, (fname, mname, lname, str_dob, dod))
		musician_id = cur.lastrowid

		# List of instruments
		for instrument in musician.find('instruments').findall('instrument'):
			if instrument.text not in instruments:
				print instrument.text
				query = "INSERT INTO instruments (name) VALUES (%s)"
				cur.execute(query, (instrument.text))
				instruments.append(instrument.text)
				instrument_ids.append(cur.lastrowid)

			# Insert the musician-to-instrument map
			query = "INSERT INTO mus_to_ins (mus_id, ins_id) VALUES (%s, %s)"
			print ' ' + str(musician_id) + ' ' + str(instrument_ids[instruments.index(instrument.text)])
			cur.execute(query, (musician_id, instrument_ids[instruments.index(instrument.text)]))

	# Commit the data
	db.commit()
	print "Committed"
			
except Exception as e:
	db.rollback()
	print str(e)

# Close connection
db.close()