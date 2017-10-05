
#include<iostream>
#include<bits/stdc++.h>

using namespace std;

int main()
{
    int x=0,i;

    int n;
    cin>>n;

    string s[n],s1="X++",s2="++X",s3="X--",s4="--X";
    
     
     for(i=0;i<n;i++)
     {
     	cin>>s[i];

     	if( (s1).compare(s[i]) ==0 )
     		x++;
     	  else
     	if( (s2).compare(s[i]) ==0 )
     		++x;
     		else
     	if( (s3).compare(s[i]) ==0 )
     		x--;
     		else
     	if( (s4).compare(s[i]) ==0 )
     		--x;		
     }


cout<<x;


return 0;
}