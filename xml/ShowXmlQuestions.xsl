<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <h1>Preguntas.</h1>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th><b>Autor</b></th>
                        <th><b>Enunciado</b></th>
                        <th><b>Respuesta correcta</b></th>
                        <th><b>Respuestas incorrectas</b></th>
                        <th><b>Tema</b></th>
                    </tr>
                    <xsl:for-each select="assessmentItems/assessmentItem">
                    <tr> 
                        <td><xsl:value-of select="@author" /></td>
                        <td><xsl:value-of select="itemBody" /></td> 
                        <td><xsl:value-of select="correctResponse" /></td>
                        <td>
                            <ul>
                            <xsl:for-each select="incorrectResponses" >
                                <li><xsl:value-of select="value[1]" /></li>
                                <li><xsl:value-of select="value[2]" /></li>
                                <li><xsl:value-of select="value[3]" /></li>
                            </xsl:for-each>
                            </ul>
                        </td>       
                        <td><xsl:value-of select="@subject" /></td>
                    </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>