<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <body>
        <h2>XML/XSL Testing</h2>
        <table>
          <thead>
            <tr>
              <th>
                <input type='checkbox'/>
              </th>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            <xsl:for-each select="records/record">
              <tr>
                <th>
                  <input type='checkbox' name='id'>
                    <xsl:attribute name="value">
                      <xsl:value-of select="id"/>
                    </xsl:attribute>
                  </input>
                </th>
                <td>
                  <a>
                    <xsl:attribute name="href">
                      <xsl:value-of select="concat('/view/user/named(', slug, ')')"/>
                    </xsl:attribute>
                    <xsl:value-of select="name"/>
                  </a>
                </td>
              </tr>
            </xsl:for-each>
          </tbody>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
