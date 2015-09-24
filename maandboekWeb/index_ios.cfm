<!---gegevens moeten geencrypt worden aan de ios kant en hier gedecrypt worden --->
<cfif #url.userid# EQ "3">
	
	<cfoutput>index_IOS index pagina</cfoutput>
 	<cfoutput>user bekend in usersportal als #GetAuthUser()#</cfoutput>
	<cfoutput>users opvragen queries bepperkt door inlog rol en rechten in mysql</cfoutput> 
<!---	<cfoutput>#url.pijn#</cfoutput>
	<cfoutput>#url.vermoeidheid#</cfoutput>
	<cfoutput>#url.instabiliteit#</cfoutput>--->
		<!---
            Insert into pijn
            pijn =  vermoeidheid =  instabiliteit = 
        --->
        <cfquery dataSource="user" name="insertQuery" > 
        INSERT INTO `usersportal`.`gevoel`
			(
			`userid`,
			`pijn`,
			`vermoeidheid`,
			`instabiliteit`)
			VALUES
			(
			#url.userid#,
			#url.pijn#,
			#url.vermoeidheid#,
			#url.instabiliteit#
			)
			
		</cfquery>
        <cfoutput>-einde-</cfoutput>
	<cfabort>
</cfif>
  