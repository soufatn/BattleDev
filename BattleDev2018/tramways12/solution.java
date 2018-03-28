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

  static int[][] pay;
  static int[][] subRes;

  private static int getMax(int min, int max) {

    if (max <= min) {
      return 0;
    }
    if (subRes[min][max] != -1) {
      return subRes[min][max];
    }


    int res = -1;
    for (int i = min ; i <= max; i++) {
      res = Math.max(res, pay[min][i] + getMax(min+1, i - 1) + getMax(i + 1, max));
    }
    subRes[min][max] = res;
    return res;
  }


  public static void main( String[] argv ) throws Exception {

    Scanner sc = new Scanner(System.in);
    int n = sc.nextInt();
    pay = new int[n][n];
    subRes = new int[n][n];
    for (int i = 0; i < n; i++) {
      for (int j = 0; j < n; j++) {
        pay[i][j] = sc.nextInt();
        subRes[i][j] = -1;
      }
    }
    System.out.println(getMax(0, n-1));

	/* Vous pouvez aussi effectuer votre traitement une fois que vous avez lu toutes les données.*/
  }
}
