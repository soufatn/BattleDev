/****************************************************************
/***/
/***/
/** SOLUTION BY egaetan*/
/***/
/***/
/********************************************************************/
package com.isograd.exercise;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;
import java.util.Scanner;

public class IsoContest {
	

	
	static class F {
		int[] notes =  new int[6];
		public int dist(F other)  {
			int res = 0;
			for (int i = 0; i < 5; i++) {
				res += Math.abs(notes[i] - other.notes[i]);
			}
			return res;
		}
	}
	
	public static void main(String[] args) throws Exception {
		//System.setIn(new FileInputStream(new File("input1.txt")));
		//System.setOut(new PrintStream(new FileOutputStream(new File("output.out"))));
		
		String  line;
		Scanner sc = new Scanner(System.in);
		F mine = new F();
		for (int i = 0;  i < 5; i++) {
			mine.notes[i] = sc.nextInt();; 
		}
		sc.nextLine();
		
		int nbFriends = sc.nextInt();
		sc.nextLine();

		int nbBestFriends = sc.nextInt();
		sc.nextLine();
		
		List<F> friends = new ArrayList<>();
		for (int i = 0; i < nbFriends; i ++) {
			F f = new F();
			friends.add(f);
			for (int j = 0;  j < 6; j++) {
				f.notes[j] = sc.nextInt();; 
			}
			sc.nextLine();
		}
		
		friends.sort(Comparator.comparing(f -> f.dist(mine)));
		double mean = 0.;
		for (int i = 0; i < nbBestFriends; i++) {
			mean += friends.get(i).notes[5];
		}
		mean = mean / nbBestFriends;
		System.out.println((int) mean);
	}
}
