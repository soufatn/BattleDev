
/****************************************************************
/***/
/***/
/** SOLUTION BY Fab_2*/
/***/
/***/
/********************************************************************/
/*******
 * Read input from System.in
 * Use System.out.println to ouput your result.
 * Use:
 *  IsoContestBase.localEcho( variable)
 * to display variable in a dedicated area.
 * ***/
package com.isograd.exercise;
import java.util.*;

public class IsoContest {
    public static void main( String[] argv ) throws Exception {
        String  line;
        Scanner sc = new Scanner(System.in);
        sc.nextLine();
        double max=0;
        while(sc.hasNextLine()) {
            line = sc.nextLine();
            double currentAverage = Arrays.stream(line.split(" "))
            .mapToDouble(Double::valueOf)
            .average().getAsDouble();
            max = Math.max(currentAverage, max);
            /* Lisez les données et effectuez votre traitement */
        }
        System.out.println((int)Math.ceil(max));
        /* Vous pouvez aussi effectuer votre traitement une fois que vous avez lu toutes les données.*/
    }
}
