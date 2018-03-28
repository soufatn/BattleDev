/****************************************************************
/***/
/***/
/** SOLUTION BY Stan_2*/
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

  static int[] ar = new int[6];

  public static void turn(int ind) {
    int[] ar2 = new int[6];
    for (int i = ind; i < 6; i++) {
      ar2[i] = ar[i];
    }
    for (int i = ind; i < 6; i++) {
      ar[i] = ar2[5 - i + ind];
    }
  }

  public static int findWhere(int ind) {
    for (int i = 0; i < 6; i++) {
      if (ar[i] < ar[ind]) {
        return i;
      }
    }
    throw new RuntimeException("toto");
  }

  public static int findMax() {
    int last = 100;
    for (int i = 0; i < 6; i ++) {
      if (ar[i] > last) {
        return i;
      }
      last = ar[i];
    }
    return 10;
  }

  public static int findRes(int ind) {
    if (findMax() == 10) {
      return ind;
    }
    if (ind == 7) {
        return 7;
    } else {
      int res = 7;
      for (int i = 0; i < 6; i ++) {
        turn(i);
        res = Math.min(res, findRes(ind + 1));
        turn(i);
      }
      return res;
    }
  }

  public static void main( String[] argv ) throws Exception {


    Scanner sc = new Scanner(System.in);
    for (int i = 0; i < 6; i++) {
      ar[5-i] = sc.nextInt();
    }
    System.out.println(findRes(0));
	/* Vous pouvez aussi effectuer votre traitement une fois que vous avez lu toutes les données.*/
  }
}
