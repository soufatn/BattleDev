//***************************************************************
//*
//*
//* SOLUTION BY schadocalex
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

String.prototype.reverse = function () {
    return this.split("").reverse().join("");
}

function ContestResponse(){
    "use strict";
	const crepes = input.map(el => +el).reverse();

    function loop(crepes, ite) {
        if(ite >= 7) return ite;
        let finish = true;
        for(let i = 0; i < crepes.length-1; i++) {
            if(crepes[i] < crepes[i+1]) {
                finish = false;
                break;
            }
        }
        if(finish) {
            return ite;
        }
        let min_ = 10;
        for(let i = 0; i < crepes.length-1; i++) {
            const score = loop(crepes.slice(0, i).concat(crepes.slice(i).reverse()), ite+1);
            if(score < min_) {
                min_ = score;
            }
        }
        return min_;
    }

    console.log(loop(crepes, 0))
}
