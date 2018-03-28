
//***************************************************************
//*
//*
//* SOLUTION BY FonkyMonkey
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
	var n  = input[0];
	var restos = input.splice(1);
	var moyenne = restos.reduce((a,v,i,t) => {
	    LocalPrint( "a " +a );
	    LocalPrint( "v " +a );
	    var moy = Math.ceil(v.split(" ").reduce((a2,v2)=>parseInt(a2)+parseInt(v2),0)/ 3);
	    LocalPrint( "moy " + moy );
	    if( moy > a)
	        return moy;
	    return a;
	}, 0);
	console.log(moyenne);
}
