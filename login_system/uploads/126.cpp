
#include<iostream>
#include<bits/stdc++.h>
using namespace std;

int main()
{
	int n,i;
    cin>>n;
	double arr[n],D=n;
    double N=0.00;
    for(i=0;i<n;i++)
    {
    	cin>>arr[i];
    	N=N+(arr[i]/100);
    }
    
   
    cout<<(N/n)*100;
      


return 0;
}
