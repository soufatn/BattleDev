/****************************************************************
/***/
/***/
/** SOLUTION BY modulo*/
/***/
/***/
/********************************************************************/
package com.isograd.exercise;
import java.util.*;

public class IsoContest {
    public static void main( String[] argv ) throws Exception {
        String  line;
        Scanner sc = new Scanner(System.in);
        int pp = Integer.parseInt(sc.nextLine());

        sc.nextLine();

        double total = 0;

        while(sc.hasNextLine()) {
            line = sc.nextLine();

            final int groupe = Integer.parseInt(line);

            double reduction = 1;
            if(groupe >= 4) {
                reduction = 0.90;
            }
            if(groupe >= 6) {
                reduction = 0.80;
            }
            if(groupe >= 10) {
                reduction = 0.70;
            }

            total += (pp*groupe)*reduction;
        }

        System.out.println((int) Math.ceil(total));
    /* Vous pouvez aussi effectuer votre traitement une fois que vous avez lu toutes les données.*/
    }
}
