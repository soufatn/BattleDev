//***************************************************************
//*
//*
//* SOLUTION BY Gannon
//*
//*
//******************************************************************
/*******
 * Read input from STDIN
 * Use console.log()  to output your result.
 * Use:
 *      LocalPrint( $variable ); 
 * to display simple variables in a dedicated area.
 * 
 * Use:
 *      LocalPrintArray( $array ); 
 * to display arrays in a dedicated area.
 * ***/

var input = [];

readline_object.on("line", (value) => { //Read input values
	input.push(value);
})
//Call ContestResponse when all inputs are red
readline_object.on("close", ContestResponse); 


function ContestResponse(){
    var mesNote = input[0].split(' ').map(e => parseInt(e))
    var nbTruePote = parseInt(input[2])
    var notePote = input.splice(3).map(n => n.split(' ').map(e => parseInt(e)))
    
    notePote = notePote.map(notes => {
        var ecart = notes.slice(0, 5).map((n, i) => Math.abs(n - mesNote[i]))
        var totalecart = ecart.reduce((acc, n) => acc + n)
        return {
            totalecart: totalecart,
            newNote: notes[5]
        }
    })
    notePote.sort((a, b) => a.totalecart - b.totalecart)

    truePote = notePote.slice(0, nbTruePote)
    LocalPrintArray(notePote)
    var moy = Math.floor(truePote.reduce((acc, n) => acc + n.newNote, 0) / nbTruePote)
    console.log(moy)
    
}
